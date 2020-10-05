<?php

namespace App\Models;

use App\Question;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'owner_id', 'question_id', 'response_id'];

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function responses(){
        return $this->hasMany('App\Answer');
    }
}
