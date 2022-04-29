<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function modele()
    {
        return $this->belongsTo(Modele::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
