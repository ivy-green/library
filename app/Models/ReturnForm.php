<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiveBack extends Model
{
    use HasFactory;

    protected $table = 'phieumuontra';
    protected $primaryKey = 'maphieu';

    protected $fillable = [];

}
