<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'phieubaocao';

    protected $fillable = [
        'id',
        'matt',
        'tieude',
        'noidung',
        '_file',
        'created_at',
        'updated_at',
    ];
}
