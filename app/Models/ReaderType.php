<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReaderType extends Model
{
    use HasFactory;
    protected $table = 'loaidg';
    protected $fillable = [
        'maloai',
        'tenloai',
        'ngaytra',
    ];
}
