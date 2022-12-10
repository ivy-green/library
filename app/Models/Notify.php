<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    use HasFactory;
    
    protected $table = 'thongbao';

    protected $fillable = [
        'id',
        'matt',
        'tieude',
        'noidung',
        'created_at',
        'updated_at',
        'quantrong',
    ];
}
