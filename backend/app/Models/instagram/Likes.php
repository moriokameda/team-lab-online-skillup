<?php

namespace App\Models\instagram;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $fillable = ["user_id", "photo_id"];
    use HasFactory;
}
