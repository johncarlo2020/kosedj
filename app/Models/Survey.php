<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    protected $appends = ['questions'];

    public function getQuestionsAttribute()
    {
        return $this->question()->get();
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }
}
