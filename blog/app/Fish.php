<?php namespace App;
 
use Illuminate\Database\Eloquent\Model;
class Fish extends Model
{
    
    protected $table = 'fish';
    public function bear() {
		return $this->belongsTo('App\Bear','bear_id','id');
	}
    
}