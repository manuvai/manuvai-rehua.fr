<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkedinPost extends Model
{
    use HasFactory;

    public function medias() {
        return $this->hasMany(LinkedinMediaPost::class, 'post_id');
    }
}
