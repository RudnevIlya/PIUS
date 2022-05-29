<?php

namespace App\Domain\Film\Catalog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'film';
    protected $fillable = ['title','duration','rate','premiere_date','creation_date'];
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function actor()
    {
        return $this->belongsToMany(Actor::class);
    }
}
