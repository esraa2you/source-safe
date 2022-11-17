<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;

    protected $table='documents';

    protected $fillable=[
        'name',
        'path',
        'status',
    ];

    public function Groups(){
        return $this->hasMany(Group_doc::class,'group_id','id');
    }

}
