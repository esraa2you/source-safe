<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Node\Block\Document;

class Group_doc extends Model
{
    use HasFactory;
    protected $table='group_doc';
    protected $fillable=[
        'group_id',
        'doc_id',
    ];

    public function Group(){
        return $this->belongsToMany(Group::class,'group_id','id');
    }

    public function docs(){
        return $this->belongsToMany(Document::class,'doc_id','id');
    }
}
