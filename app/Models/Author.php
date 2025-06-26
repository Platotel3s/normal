<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table='authors';
    protected $fillable=[
        'namaPenulis',
        'user_id',
    ];
    public function bukus(){
        return $this->belongsToMany(Buku::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
