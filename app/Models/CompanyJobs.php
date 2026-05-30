<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyJobs extends Model
{

    protected $table='company_jobs';

    protected $fillable=[
    'title',
    'slug',
    'description',
    'department',
    'location',
    'experience',
    'employment_type',
    'vacancies',
    'deadline',
    'status'
    ];
}
