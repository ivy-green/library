<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowFormDetail extends Model
{
    use HasFactory;

    protected $table = 'ctphieumuontra';

    protected $fillable = [
        'id',
        'maphieu',
        'masach',
        'tinhtrang',
        'mavp',
        'ngaytra',
        'created_at',
        'updated_at',
    ];
}
