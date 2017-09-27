<?php namespace App;
 
use Illuminate\Database\Eloquent\Model;

class Bear extends Model
{
    
    public function fish() {
		return $this->hasOne('App\Fish','bear_id','id'); 
	}

	// each bear climbs many trees
	public function trees() {
		return $this->hasMany('App\Tree','bear_id','id');
	}

	// each bear BELONGS to a picnic
	public function picnics() {
		return $this->belongsToMany('App\Picnic', 'bears_picnics', 'bear_id', 'picnic_id');
	}
    
}