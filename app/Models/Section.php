<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = ['topic_id', 'title'];

    public function subjects()
    {
        return $this->hasMany(Subjects::class);
    }

    public function section_content()
    {
        return $this->hasMany(Section_content::class);
    }
}
