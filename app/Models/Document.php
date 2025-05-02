<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'owner_code',
        'doc_type_code',
        'serial_number',
        'revision_number',
        'file_path',
        'file_name',
    ];
}
