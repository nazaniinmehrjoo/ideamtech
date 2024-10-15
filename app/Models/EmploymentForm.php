<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'gender', 'marital_status', 'military_status', 
        'phone', 'email', 'location', 'experience_years', 'education_history', 
        'training_courses', 'training_certificate', 'work_experience', 
        'work_experience_photo', 'foreign_language', 'language_proficiency', 
        'software_skills', 'about_me'
    ];
}
