<?php

namespace App\Models\instagram;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $fillable = ["user_id", "photo_id"];
    use HasFactory;

    /**
     * いいねしたユーザの取得
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }


    /**
     * いいねした写真の取得
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function photos()
    {
        return $this->belongsTo('App\Models\instagram\Photos');
    }
}
