<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignFormDetail extends Model
{
    use HasFactory;
    protected $table = 'ctphieudangky';

    protected $fillable = [
        'maphieu',
        'mads',
        'ghichu',
        'created_at',
        'updated_at'
    ];

    // protected $with = ['maphieu'];

    public function phieumt()
    {
        return $this->belongsTo(SignForm::class, 'id', 'maphieu');
    }
}
