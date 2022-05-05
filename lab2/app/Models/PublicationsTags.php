<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationsTags extends Model
{
    use HasFactory;
    protected $table = 'publication_tag';
    protected $fillable = ['publication_id', 'tag_id'];
    public $timestamp = false;
    public $timestamps = false;
}
