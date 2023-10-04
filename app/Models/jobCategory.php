<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobCategory extends Model
{
    protected $table = 'jobcategory';

    use HasFactory;
    protected $fillable = [
        'job_type',
        'status',
    ];
}
