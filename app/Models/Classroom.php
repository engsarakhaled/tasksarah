<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $table = 'classes';
    protected $fillable = [
           'className',
            'capacity',
            'is_fulled',
            'price',
            'time_from',
            'time_to',
    ];
}