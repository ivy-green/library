<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    protected $table = "authors"; 
    use HasFactory;
    protected $fillable = [
        'tentacgia',
        'ngaysinh',
        'gioitinh',
        'soluongsach',
    ];
}
