<?php

require 'vendor/autoload.php';

use Spatie\ImageOptimizer\OptimizerChainFactory;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;

$optimizerChain = OptimizerChainFactory::create();

// Define all directories to optimize
$directories = [
    'D:\IdeamTech\public\storage\posts',
    'D:\IdeamTech\public\storage\products',
    'D:\IdeamTech\public\storage\services_images',
    'D:\IdeamTech\public\assets\images',
];

// Counters
$totalFiles = 0;
$optimizedFiles = 0;

foreach ($directories as $directory) {
    if (!is_dir($directory)) {
        echo "❌ Directory not found: $directory\n";
        continue;
    }

    // Recursively find all images in the directory and subdirectories
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
    
    foreach ($iterator as $file) {
        if ($file->isFile() && preg_match('/\.(jpg|jpeg|png|webp)$/i', $file->getFilename())) {
            $filePath = $file->getPathname();
            try {
                $optimizerChain->optimize($filePath);
                echo "✅ Optimized: " . basename($filePath) . " in " . dirname($filePath) . "\n";
                $optimizedFiles++;
            } catch (Exception $e) {
                echo "❌ Error optimizing " . basename($filePath) . ": " . $e->getMessage() . "\n";
            }
            $totalFiles++;
        }
    }
}

echo "\n🎉 Done! Total images processed: $totalFiles | Total optimized: $optimizedFiles\n";
