<?php

namespace App\Models;;

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
        return $this->belongsToMany(film::class);
    }   
}
