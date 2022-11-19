<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignForm extends Model
{
    use HasFactory;
    protected $table = 'PHIEUDANGKY';

    protected $fillable = [
        'maphieu',
        'madg',
        'ngaylapphieu'
    ];
}
