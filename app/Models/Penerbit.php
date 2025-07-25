<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $table='penerbits';
    protected $fillable=[
        'namaPenerbit',
        'alamat',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
