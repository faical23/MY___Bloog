<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{
    use HasFactory, Notifiable;
    protected $table = '_post';  /// table name to will be insert data

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_titre',
        'post_topic',
        'post_img',
        'post_description',
        'post_like',
        'post_ID',
    ];

}
