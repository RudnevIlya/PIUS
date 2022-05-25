<?php

namespace App\Domain\Actor\Catalog\Models;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Actor extends Model
{
    protected $table = 'actor';
    protected $fillable = ['full_name','height','birthdate','creation_date'];
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function film()
    {
        return $this->belongsToMany(Film::class);
    }   
}
