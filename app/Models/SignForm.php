<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignForm extends Model
{
    use HasFactory;
    protected $table = 'phieudangky';

    protected $fillable = [
        'id',
        'maphieu',
        'madg',
        'ngaylapphieu',
        'created_at',
        'updated_at',
    ];

    protected $with = ['phieuvp'];

    public function phieuvp()
    {
        return $this->hasMany(SignFormDetail::class, 'maphieu', 'id');
    }
}
