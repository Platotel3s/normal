<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table='authors';
    protected $fillable=[
        'namaPenulis'
    ];
    public function bukus(){
        return $this->belongsToMany(Buku::class);
    }
}
