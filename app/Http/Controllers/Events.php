<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Country;
use App\Events_model;
use App\Events_gallery;
class Events extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function gallery(){
        $gallery=DB::table('event_gallery')
        ->select("*")
        ->join('events','events.id','=','event_gallery.event')
        // ->join("faculty_master as fm","fm.id",'=','ca.faculty')
        ->paginate(5);
        return view("event/gallery/show",["gallery"=>$gallery]);
    }

    public function create_gallery(){
        $events = Events_model::all();
        return view('event/gallery/create',['events' => $events]);
    }

    public function store_gallery(Request $request){
        $Events_gallery = new Events_gallery();
        if ($request->hasFile('attachment')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/events/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            $image = $request->file('attachment');
            $file_name = "events_" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/images/events/', $file_name);
            $Events_gallery->image = '/images/events/'. $file_name;
        }

        $Events_gallery->event=$request->input('event');
        $Events_gallery->image_description=$request->input('image_description');
        $Events_gallery->save();
        return redirect()->intended('events/gallery');
    }


    public function edit_gallery(Request $request){
        $id=$_GET['id'];
        $Events_gallery = Events_gallery::find($id);
        if ($Events_gallery == null) {
            return redirect()->intended('events/gallery');
        }
        $events = Events_model::all();
        return view('event/gallery/edit', ['events' => $events,'gallery' => $Events_gallery]);
    }


    public function update_gallery(Request $request){
        $id=$_GET['id'];
        $Events_gallery = Events_gallery::findOrFail($id);
        $keys = ['event', 'image_description'];
        $input = $this->createQueryInput($keys, $request);
    
        if ($request->hasFile('attachment')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/events/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            $image = $request->file('attachment');
            $file_name = "events_" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/images/events/', $file_name);
            $input['image'] = '/images/events/'. $file_name;
        }
        
        Events_gallery::where('id', $id)
        ->update($input);
        return redirect()->intended('events/gallery');
    }



    public function destroy_gallery(Request $request){
        $id=$_GET['id'];
        $Events_gallery = Events_gallery::find($id);
        $Events_gallery->delete();
        return redirect()->intended('events/gallery');
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
