<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table='reservations';
    protected $fillable=[
        'date',
        'user_id',
        'group_doc_id',
    ];

    public function user(){
        return $this->belongsToMany(User::class,'user_id','id');

    }
    public function group_doc(){
        return $this->belongsToMany(Group_doc::class,'group_doc_id','id');

    }
}
