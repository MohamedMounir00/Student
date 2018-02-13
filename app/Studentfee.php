<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentfee extends Model
{
     protected $table= 'studentfees';
    protected $fillable =['student_id',
					    'level_id',
					    'fee_id',
					    'amount',
					    'discount'

                        ];
    protected $primaryKey = 's_fee_id';
    public $timestamps = false;

}
