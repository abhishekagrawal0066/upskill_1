<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apllyJobsList extends Model
{
    protected $table = 'applyjobslist'; 
    use HasFactory;
    protected $fillable = [
        'userid',
        'companyid',
        'name',
        'email',
        'language',
        'companies_name',
        'experience',
        'message',

    ];
}
