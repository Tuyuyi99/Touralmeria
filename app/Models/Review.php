<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function establishment() {
        return $this->hasMany(Establishment::class, 'id_establishment');
    }
}
