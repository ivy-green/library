<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "cuonsach";
    protected $fillable = [
        'mads',
        'ngaynhap',
        'tinhtrang',
        'ghichu',
    ];
    use HasFactory;
}
