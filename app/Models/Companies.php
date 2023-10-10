<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    protected $fillable = [
        'jobcategory',
        'companies_name',
        'image',
        'salary',
        'country',
        'state',
        'city',
        'time',
        'experience',
        'description',
        'status',
    ];
}
