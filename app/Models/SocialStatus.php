<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialStatus extends Model
{
    use HasFactory;
    public $table = 'social_status';

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
