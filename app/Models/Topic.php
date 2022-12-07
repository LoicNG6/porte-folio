<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $fillable = ['title_fr', 'description_fr', 'title_en', 'description_en'];

    public function section()
    {
        return $this->hasMany(Section::class);
    }
}
