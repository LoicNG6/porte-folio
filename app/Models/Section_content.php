<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section_content extends Model
{
    use HasFactory;
    protected $fillable = ['section_id', 'language', 'description', 'what_i_learned'];
}
