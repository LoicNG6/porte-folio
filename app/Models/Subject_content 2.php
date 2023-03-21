<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject_content extends Model
{
    use HasFactory;
    protected $fillable = ['subject_id', 'language', 'description'];
}
