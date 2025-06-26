<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    protected $table='tahuns';
    protected $fillable=[
        'tahun',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
