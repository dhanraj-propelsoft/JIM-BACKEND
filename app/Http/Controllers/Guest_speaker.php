<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Guest;
use Illuminate\Support\Facades\DB;
class Guest_speaker extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function guest_speaker(){
        $guest_speaker=DB::table('guest_speaker')
        ->select("*")
        //->join('campus_images','campus_images.campus_id','=','campus.id')
        // ->join("faculty_master as fm","fm.id",'=','ca.faculty')
        ->paginate(5);
        return view("guest_speaker/show",["guest_speaker"=>$guest_speaker]);
    }

    public function create_guest_speaker(){
        $guest_speaker = Guest::all();
        return view('guest_speaker/create',['guest_speaker' => $guest_speaker]);
    }

    public function store_guest_speaker(Request $request){
        $guest_speaker = new Guest();
        $guest_speaker->resource_person=$request->input('resource_person');
        $guest_speaker->activity=$request->input('activity');
        $guest_speaker->date=$request->input('date');
        $guest_speaker->beneficiaries=$request->input('beneficiaries');
        $guest_speaker->time=$request->input('time1');
        $guest_speaker->place=$request->input('place');
        $guest_speaker->content=$request->input('content');
        $guest_speaker->save();
        $insert_id=$guest_speaker->id;
        return redirect()->intended('guest_speaker/guest_speaker');
    }


    public function edit_guest_speaker(Request $request){
        $id=$_GET['id'];
        $guest_speaker = Guest::find($id);
        if ($guest_speaker == null) {
            return redirect()->intended('guest_speaker/guest_speaker');
        }
        //$campus_images = Campus_images::find();

        return view('guest_speaker/edit', ['guest_speaker' => $guest_speaker]);
    }


    public function update_guest_speaker(Request $request){
        $id=$_GET['id'];
        $guest_speaker = Guest::findOrFail($id);
        $keys = ['date','activity','resource_person', 'beneficiaries','time','place','content'];
        $input = $this->createQueryInput($keys, $request);
        $insert_array=array();
        Guest::where('id', $id)
        ->update($input);        
        return redirect()->intended('guest_speaker/guest_speaker');
    }

    public function destroy_guest_speaker(Request $request){
        $id=$_GET['id'];
        $guest_speaker = Guest::find($id);
        $guest_speaker->delete();
        return redirect()->intended('guest_speaker/guest_speaker');
    }

    private function createQueryInput($keys, $request) {
        $queryInput = [];
        for($i = 0; $i < sizeof($keys); $i++) {
            $key = $keys[$i];
            $queryInput[$key] = $request[$key];
        }

        return $queryInput;
    }


}
