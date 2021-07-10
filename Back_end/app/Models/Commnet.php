<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commnet extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'commentaires';  /// table name to will be insert data

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ID_user',
        'ID_post',
        'commentaire',
    ];
}
