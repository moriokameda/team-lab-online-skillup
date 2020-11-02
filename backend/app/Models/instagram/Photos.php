<?php

namespace App\Models\instagram;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $fillable = [
        'id', 'user_id', 'photo_url', 'caption'
    ];
    use HasFactory;

    /**
     * いいねした写真の取得
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function likes()
    {
        return $this->hasOne('App\Models\instagram\Likes', 'photo_id');
    }
}
