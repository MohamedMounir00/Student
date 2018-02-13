<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    
	protected $table = 'classes';
	protected $fillable = ['academic_id','level_id','shift_id','time_id','batche_id','group_id',
'start_date','end_date','active'];
	protected $primaryKey = 'classe_id';

	public $timestamps = false;
}





