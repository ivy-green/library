<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\BorrowFormDetail;

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

    protected $with = ['phieuvp'];

    public function phieuvp()
    {
        return $this->hasMany(BorrowFormDetail::class, 'mavp', 'id');
    }

}
