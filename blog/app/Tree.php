<?php namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Tree extends Model
{
    
    public function bear() {
		return $this->belongsTo('App\Bear','bear_id','id');
	}
    
}