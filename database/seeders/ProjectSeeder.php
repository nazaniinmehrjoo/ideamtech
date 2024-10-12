<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        Project::create([
            'name' => 'پروژه قم',
            'capacity' => '5000 تن در روز',
            'client' => 'شرکت A',
            'start_date' => Carbon::parse('2023-01-01'),
            'end_date' => Carbon::parse('2023-12-31'),
            'status' => 'تکمیل شده',
            'type' => 'خشک کن سریع',
            'lat' => 34.6399,
            'lng' => 50.8759,
        ]);

        Project::create([
            'name' => 'پروژه سلیمانیه عراق',
            'capacity' => '3000 تن در روز',
            'client' => 'شرکت B',
            'start_date' => Carbon::parse('2023-02-20'),
            'end_date' => null, // Still ongoing
            'status' => 'در حال انجام',
            'type' => 'راه اندازی و تجهیزات خط تولید آجر',
            'lat' => 35.5616,
            'lng' => 45.4329,
        ]);

        Project::create([
            'name' => 'پروژه قزوین',
            'capacity' => '4000 تن در روز',
            'client' => 'شرکت C',
            'start_date' => Carbon::parse('2023-04-10'),
            'end_date' => Carbon::parse('2023-12-20'),
            'status' => 'تکمیل شده',
            'type' => 'اصلاح ارتقا خط تولید',
            'lat' => 36.2688,
            'lng' => 50.0041,
        ]);

        // Add more projects if needed
    }
}
