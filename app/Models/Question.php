<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'owner_id'];

    public function owner(){
        return $this->belongsTo(User::class);
    }
}
