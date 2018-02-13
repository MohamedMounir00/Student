<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statue extends Model
{
      protected $table ='statues' ;
     protected $fillable = ['student_id','classe_id'];

    protected $primaryKey ='statue_id';
    public $timestamps =false;

}
