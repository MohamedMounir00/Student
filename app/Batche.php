<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batche extends Model
{
    protected $table = 'batches';
    protected  $fillable =['batche'];
    protected  $primaryKey = 'batche_id';

    public $timestamps =false;

}
