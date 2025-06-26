<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table='genres';
    protected $fillable=[
        'namaGenre',
        'user_id',
    ];
    public function buku(){
        return $this->hasMany(Buku::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
