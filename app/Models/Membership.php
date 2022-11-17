<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $table = 'memberships';

    protected $fillable=[
        'user_id',
        'group_id',
        'join_date',
        'group_role',
    ];

    public function Group(){
       return $this->belongsTo(Group::class,'group_id','id');
    }
    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
     }
}
