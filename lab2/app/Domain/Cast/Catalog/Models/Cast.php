<?php

namespace App\Domain\Cast\Catalog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use HasFactory;
    protected $table = 'cast';
    protected $fillable = ['id_film', 'id_actor','role'];
}
