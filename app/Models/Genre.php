<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table='genres';
    protected $fillable=[
        'namaGenre',
    ];
    public function buku(){
        return $this->hasMany(Buku::class);
    }
}
