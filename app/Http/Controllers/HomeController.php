<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Main_slider;
use App\Main_sliders;
use App\In_focus;
use App\Events;
use App\Testimonials;
use File;
class HomeController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function main_slider(){
        $sliders=DB::table('main_sliders')
        ->select("*")
        ->paginate(5);
        return view("home/main_slider/show",["sliders"=>$sliders]);
    }


    public function in_focus(){
        $focus=DB::table('in_focus')
        ->select("*")
        ->paginate(5);
        return view("home/in_focus/show",["focus"=>$focus]);
    }

    public function events(){
        $events=DB::table('events')
        ->select("*")
        ->paginate(5);
        return view("home/events/show",["events"=>$events]);
    }

    public function testimonial(){
        $testimonials=DB::table('testimonals')
        ->select("*")
        ->paginate(5);
        return view("home/testimonials/show",["testimonials"=>$testimonials]);
    }


    public function create_slider(){
        return view('home/main_slider/create');
    }


    public function create_infocus(){
        return view('home/in_focus/create');
    }

    public function create_events(){
        return view('home/events/create');
    }

    public function create_testimonial(){
        return view('home/testimonials/create');
    }

    public function store(Request $request){
        $path = $request->file('picture')->store('sliders');
        $main_sliders = new Main_sliders();
        if ($request->hasFile('picture')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/main_sliders/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            $image = $request->file('picture');
            $file_name = "slider_" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/images/main_sliders/', $file_name);
            $main_sliders->image = '/images/main_sliders/'. $file_name;
        }
        $main_sliders->title=$request->input('title');
        $main_sliders->content=$request->input('content');
        $main_sliders->status=1;
        $main_sliders->save();
        return redirect()->intended('home-page/main_slider');
    }



    public function store_infocus(Request $request){
        $path = $request->file('picture')->store('sliders');
        $infocus = new In_focus();
        if ($request->hasFile('picture')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/in_focus/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            $image = $request->file('picture');
            $file_name = "infocus_" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/images/in_focus/', $file_name);
            $infocus->media = '/images/in_focus/'. $file_name;
        }
        $infocus->title=$request->input('title');
        $infocus->description=$request->input('description');
        $infocus->status=1;
        $infocus->save();
        return redirect()->intended('home-page/in_focus');
    }


    public function store_events(Request $request){
        $events = new Events();
        if ($request->hasFile('picture')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/events/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            $image = $request->file('picture');
            $file_name = "events_" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/images/events/', $file_name);
            $events->image = '/images/events/'. $file_name;
        }
        $events->title=$request->input('title');
        $events->description=$request->input('description');
        $events->event_date=$request->input('event_date');
        $events->status=1;
        $events->save();
        return redirect()->intended('home-page/events');
    }



    public function store_testimonial(Request $request){
        $testimonial = new Testimonials();
        if ($request->hasFile('picture')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/testimonial/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            $image = $request->file('picture');
            $file_name = "testimonial_" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/images/testimonial/', $file_name);
            $testimonial->image = '/images/testimonial/'. $file_name;
        }
        $testimonial->title=$request->input('title');
        $testimonial->description=$request->input('description');
        $testimonial->status=1;
        $testimonial->save();
        return redirect()->intended('home-page/testimonial');
    }



    public function edit_slider(Request $request){
        $id=$_GET['id'];
        $main_slider = Main_sliders::find($id);
        if ($main_slider == null) {
            return redirect()->intended('home-page/main_slider');
        }

        return view('home/main_slider/edit', ['main_slider' => $main_slider]);
    }

    public function edit_infocus(Request $request){
        $id=$_GET['id'];
        $infocus = In_focus::find($id);
        if ($infocus == null) {
            return redirect()->intended('home-page/in_focus');
        }

        return view('home/in_focus/edit', ['infocus' => $infocus]);
    }


    public function edit_events(Request $request){
        $id=$_GET['id'];
        $events = Events::find($id);
        if ($events == null) {
            return redirect()->intended('home-page/events');
        }
        return view('home/events/edit', ['events' => $events]);
    }


    public function edit_testimonial(Request $request){
        $id=$_GET['id'];
        $testimonial = Testimonials::find($id);
        if ($testimonial == null) {
            return redirect()->intended('home-page/testimonial');
        }

        return view('home/testimonials/edit', ['testimonial' => $testimonial]);
    }


    public function update_slider(Request $request){
        $id=$_GET['id'];
        $main_sliders = Main_sliders::findOrFail($id);
        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        if ($request->hasFile('picture')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/main_sliders/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            $image = $request->file('picture');
            $file_name = "slider_" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/images/main_sliders/', $file_name);
            $input['image'] = '/images/main_sliders/'. $file_name;
        }
        
        Main_sliders::where('id', $id)
        ->update($input);
        return redirect()->intended('home-page/main_slider');
    }


    public function update_infocus(Request $request){
        $id=$_GET['id'];
        $infocus = In_focus::findOrFail($id);
        $keys = ['title', 'description'];
        $input = $this->createQueryInput($keys, $request);
        if ($request->hasFile('picture')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/in_focus/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            $image = $request->file('picture');
            $file_name = "infocus_" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/images/in_focus/', $file_name);
            $input['media'] = '/images/in_focus/'. $file_name;
        }
        
        In_focus::where('id', $id)
        ->update($input);
        return redirect()->intended('home-page/in_focus');
    }

    public function update_events(Request $request){
        $id=$_GET['id'];
        $events = Events::findOrFail($id);
        $keys = ['title', 'description','event_date'];
        $input = $this->createQueryInput($keys, $request);
        if ($request->hasFile('picture')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/events/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            $image = $request->file('picture');
            $file_name = "events_" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/images/events/', $file_name);
            $input['image'] = '/images/events/'. $file_name;
        }
        
        Events::where('id', $id)
        ->update($input);
        return redirect()->intended('home-page/events');
    }


    public function update_testimonial(Request $request){
        $id=$_GET['id'];
        $testimonial = Testimonials::findOrFail($id);
        $keys = ['title', 'description'];
        $input = $this->createQueryInput($keys, $request);
        if ($request->hasFile('picture')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/testimonial/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            $image = $request->file('picture');
            $file_name = "testimonial_" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/images/testimonial/', $file_name);
            $input['image'] = '/images/testimonial/'. $file_name;
        }
        
        Testimonials::where('id', $id)
        ->update($input);
        return redirect()->intended('home-page/testimonial');
    }


    public function destroy_slider(Request $request){
        $id=$_GET['id'];
        $main_slider = Main_sliders::find($id);
        $main_slider->delete();
        return redirect()->intended('home-page/main_slider');
    }

    public function destroy_infocus(Request $request){
        $id=$_GET['id'];
        $infocus = In_focus::find($id);
        $infocus->delete();
        return redirect()->intended('home-page/in_focus');
    }


    public function destroy_events(Request $request){
        $id=$_GET['id'];
        $events = Events::find($id);
        $events->delete();
        return redirect()->intended('home-page/events');
    }


    public function destroy_testimonial(Request $request){
        $id=$_GET['id'];
        $testimonial = Testimonials::find($id);
        $testimonial->delete();
        return redirect()->intended('home-page/testimonial');
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
