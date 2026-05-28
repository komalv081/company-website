<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyJob extends Model
{

    protected $table='company_job';

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
