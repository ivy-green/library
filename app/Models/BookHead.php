<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookHead extends Model
{
    use HasFactory;
    protected $table = 'dausach';
    protected $fillable = [
        'mats',
        'nhaxb',
        'ngonngu',
        'bia',
        'soluong',
        'tinhtrang',
    ];
}
