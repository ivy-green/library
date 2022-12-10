<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViolationForm extends Model
{
    use HasFactory;

    protected $table = 'phieuvipham';

    protected $fillable = [
        'maphieu',
        'madg',
        'matt',
        'ngaylapphieu',
        'tienvipham',
        'dathanhtoan',
        'ghichu',
        'created_at',
        'updated_at',
    ];
}
