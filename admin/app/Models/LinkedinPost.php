<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkedinPost extends Model
{
    use HasFactory;

    public const TEXT_POST_TYPE = 1;
    public const LINK_POST_TYPE = 2;
    public const SINGLE_MEDIA_POST_TYPE = 3;
    public const MULTIPLE_MEDIA_POST_TYPE = 4;

    public function medias() {
        return $this->hasMany(LinkedinMediaPost::class, 'post_id');
    }

    public function getType() {
        $medias = $this->medias;

        if (count($medias) == 1) {
            return self::SINGLE_MEDIA_POST_TYPE;
        } else if (count($medias) > 1) {
            return self::MULTIPLE_MEDIA_POST_TYPE;
        } else {
            return self::TEXT_POST_TYPE;
        }
    }
}
