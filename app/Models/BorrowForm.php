<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowForm extends Model
{
    use HasFactory;
    protected $table = 'phieumuontra';

    protected $fillable = [
        'id',
        'maphieu',
        'madg',
        'matt',
        'ngaytradukien',
        'ngaytra',
        'mavp',
        'created_at',
        'updated_at',
    ];

}
