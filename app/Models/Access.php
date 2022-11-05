<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Access extends Model
{
    use HasFactory;

    public function users() {
        return $this->HasMany(User::class);
    }
}
