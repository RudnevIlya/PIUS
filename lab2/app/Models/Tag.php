<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';
    protected $fillable = ['title', 'token'];
    public $timestamp = false;
    public $timestamps = false;
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function publication()
    {
        return $this->belongsToMany(Publication::class);
    }
}
