<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;
    protected $fillable = ['section_id', 'location', 'team', 'started_at', 'ended_at'];

    public function subject_contents()
    {
        return $this->hasMany(Subject_content::class);
    }
}
