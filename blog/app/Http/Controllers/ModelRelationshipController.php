<?php
 
namespace App\Http\Controllers;

use App\Bear;
use App\Fish;
use App\Picnic;
use App\Tree;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Event;

use App\Events\SendMail;
 
class ModelRelationshipController extends Controller{
   
    public function OneToOneRelationship()
    {
        // find a bear named Bear A
        $bear_a = Bear::where('name', '=', 'Bear A')->first();

        // get the fish that Bear A has
        //$fish = $bear_a->fish; /*IT WILL CALL THE DETAILS/DATA FROM FISH TABLE ASSOCIATD WITH THAT BEAR (FK)*/
        
        // get the weight of the fish Bear A is going to eat
        //echo $fish->bear_id;
            //echo $bear_a->name;
        // alternatively you could go straight to the weight attribute
        //echo $bear_a->fish->weight;
       return response()->json($bear_a);

    }
    public function OneToMayRelationship()
    {
        // find the trees on which Bear B climbs
        $bear_b = Bear::where('name', '=', 'Bear A')->first();
        //$ctr = $bear_b->trees->count();
       // echo $bear_b->name; exit;
        /*foreach ($bear_b->trees as $tree)
        {
            echo $tree->type . ' ' . $tree->age. "<br>";
        }*/
        return response()->json($bear_b);
    }
    public function ManyToManyRelationship()
    {

        // get the picnics that Bear A goes to ------------------------
        $bear_a = Bear::where('name', '=', 'Bear A')->first();

        // get the picnics and their names and taste levels
        //foreach ($bear_a->picnics as $picnic) 
            //echo $picnic->name . ' ' . $picnic->taste_level."<br>";

        // get the bears that go to the Pune picnic -------------
        $picnic = Picnic::where('name', '=', 'Pune')->first();

        // show the bears
        //foreach ($picnic->bears as $bear)
          //  echo $bear->name . ' ' . $bear->type . ' ' . $bear->danger_level."<br>";

        return response()->json(['picnic_details'=>$bear_a->picnics,'bear_detail'=>$picnic->bears]);
        
    }
    public function TestEventFunction()
    {
        echo " Process Start <br>"; 
        flush();     
        Event::fire(new SendMail(2));
        echo "<br> Process End";
    }
}