<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table='bukus';
    protected $fillable=[
        'judul',
        'user_id',
        'author_id',
        'penerbit_id',
        'tahun_id',
        'genre_id',
        'gambar',
    ];
    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function penerbit(){
        return $this->belongsTo(Penerbit::class);
    }
    public function tahun(){
        return $this->belongsTo(Tahun::class);
    }
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
    public function authors(){
        return $this->belongsToMany(Author::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
