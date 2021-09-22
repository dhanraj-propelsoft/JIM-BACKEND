<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use App\Campus;
use App\Campus_images;
use App\Computer_lab;
use App\Computer_lab_images;
use App\Library;
use App\Library_images;
use App\Auditorium;
use App\Auditorium_images;
use App\Board_room;
use App\Board_room_images;
use App\Hostels;
use App\Hostel_images;
use App\Wifi_campus;
use App\Wifi_campus_images;
use App\Student_affinities;
use App\Student_affinities_images;
use App\Research_room;
use App\Research_room_images;

class Life_jim extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function campus(){
        $campus=DB::table('campus')
        ->select("*")
        //->join('campus_images','campus_images.campus_id','=','campus.id')
        // ->join("faculty_master as fm","fm.id",'=','ca.faculty')
        ->paginate(5);
        return view("life/campus/show",["campus"=>$campus]);
    }

    public function create_campus(){
        $campus = Campus::all();
        return view('life/campus/create',['campus' => $campus]);
    }

    public function store_campus(Request $request){
        $campus = new Campus();
        $campus_images = new Campus_images();
        $images = $request->file('attachment');
        $campus->title=$request->input('title');
        $campus->content=$request->input('content');
        $campus->save();
        $insert_id=$campus->id;

        if ($request->hasFile('attachment')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/campus/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
            $file_name = "campus_" . $key.time() . '.' . $file->getClientOriginalExtension();
            $file->move(base_path() . '/public/images/campus/', $file_name);
          
            $insert_array[]=array(
                'campus_id'=>$insert_id,
                'images'=>'/images/campus/'. $file_name,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            );
            }
            DB::table('campus_images') -> insert($insert_array);
        }
        
        return redirect()->intended('life_jim/campus');
    }


    public function edit_campus(Request $request){
        $id=$_GET['id'];
        $campus = Campus::find($id);
        if ($campus == null) {
            return redirect()->intended('events/gallery');
        }
        //$campus_images = Campus_images::find();
        $campus_images=DB::table('campus_images')->where('campus_id', '=', $id)->get();

        return view('life/campus/edit', ['campus' => $campus,'campus_images'=>$campus_images]);
    }


    public function update_campus(Request $request){
        $id=$_GET['id'];
        $campus = Campus::findOrFail($id);
        $campus_images = new Campus_images();
        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        $insert_array=array();
        Campus::where('id', $id)
        ->update($input);
        $images = $request->file('attachment');
        if ($request->hasFile('attachment')) {
            $campus_images::where('campus_id', $id)->delete();
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/campus/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
                $file_name = "campus_" . $key.time() . '.' . $file->getClientOriginalExtension();
                $file->move(base_path() . '/public/images/campus/', $file_name);
              
                $insert_array[]=array(
                    'campus_id'=>$id,
                    'images'=>'/images/campus/'. $file_name,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                );
                }
                DB::table('campus_images')->insert($insert_array);
        }
        
       
        return redirect()->intended('life_jim/campus');
    }

    public function destroy_campus(Request $request){
        $id=$_GET['id'];
        $campus = Campus::find($id);
        $campus->delete();
        $campus_images = new Campus_images();
        $campus_images::where('campus_id', $id)->delete();
        return redirect()->intended('life_jim/campus');
    }



    public function computer_lab(){
        $computer_lab=DB::table('computer_lab')
        ->select("*")
        //->join('campus_images','campus_images.campus_id','=','campus.id')
        // ->join("faculty_master as fm","fm.id",'=','ca.faculty')
        ->paginate(5);
        return view("life/computer_lab/show",["computer_lab"=>$computer_lab]);
    }

    public function create_computer_lab(){
        $computer_lab = Computer_lab::all();
        return view('life/computer_lab/create',['computer_lab' => $computer_lab]);
    }

    public function store_computer_lab(Request $request){
        $computer_lab = new Computer_lab();
        $computer_lab_images = new Computer_lab_images();
        $images = $request->file('attachment');
        $computer_lab->title=$request->input('title');
        $computer_lab->content=$request->input('content');
        $computer_lab->save();
        $insert_id=$computer_lab->id;

        if ($request->hasFile('attachment')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/campus/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
            $file_name = "lab_" . $key.time() . '.' . $file->getClientOriginalExtension();
            $file->move(base_path() . '/public/images/lab/', $file_name);
          
            $insert_array[]=array(
                'lab_id'=>$insert_id,
                'images'=>'/images/lab/'. $file_name,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            );
            }
            DB::table('computer_lab_images') -> insert($insert_array);
        }
        
        return redirect()->intended('life_jim/computer_lab');
    }


    public function edit_computer_lab(Request $request){
        $id=$_GET['id'];
        $computer_lab = Computer_lab::find($id);
        if ($computer_lab == null) {
            return redirect()->intended('jim_life/computer_lab');
        }
        //$campus_images = Campus_images::find();
        $computer_lab_images=DB::table('computer_lab_images')->where('lab_id', '=', $id)->get();

        return view('life/computer_lab/edit', ['computer_lab' => $computer_lab,'computer_lab_images'=>$computer_lab_images]);
    }


    public function update_computer_lab(Request $request){
        $id=$_GET['id'];
        $computer_lab = Computer_lab::findOrFail($id);
        $computer_lab_images = new Computer_lab_images();
        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        $insert_array=array();
        Computer_lab::where('id', $id)
        ->update($input);
        $images = $request->file('attachment');
        if ($request->hasFile('attachment')) {
            $computer_lab_images::where('lab_id', $id)->delete();
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/campus/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
                $file_name = "lab_" . $key.time() . '.' . $file->getClientOriginalExtension();
                $file->move(base_path() . '/public/images/lab/', $file_name);
              
                $insert_array[]=array(
                    'lab_id'=>$id,
                    'images'=>'/images/lab/'. $file_name,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                );
                }
                DB::table('computer_lab_images')->insert($insert_array);
        }
        
       
        return redirect()->intended('life_jim/computer_lab');
    }

    public function destroy_computer_lab(Request $request){
        $id=$_GET['id'];
        $computer_lab = Computer_lab::find($id);
        $computer_lab->delete();
        $computer_lab_images = new Computer_lab_images();
        $computer_lab_images::where('lab_id', $id)->delete();
        return redirect()->intended('life_jim/computer_lab');
    }




    public function library(){
        $library=DB::table('library')
        ->select("*")
        //->join('campus_images','campus_images.campus_id','=','campus.id')
        // ->join("faculty_master as fm","fm.id",'=','ca.faculty')
        ->paginate(5);
        return view("life/library/show",["library"=>$library]);
    }

    public function create_library(){
        $library = Library::all();
        return view('life/library/create',['library' => $library]);
    }

    public function store_library(Request $request){
        $library = new Library();
        $library_images = new Library_images();
        $images = $request->file('attachment');
        $library->title=$request->input('title');
        $library->content=$request->input('content');
        $library->save();
        $insert_id=$library->id;

        if ($request->hasFile('attachment')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/library/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
            $file_name = "library_" . $key.time() . '.' . $file->getClientOriginalExtension();
            $file->move(base_path() . '/public/images/library/', $file_name);
          
            $insert_array[]=array(
                'library_id'=>$insert_id,
                'images'=>'/images/library/'. $file_name,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            );
            }
            DB::table('library_images') -> insert($insert_array);
        }
        
        return redirect()->intended('life_jim/library');
    }


    public function edit_library(Request $request){
        $id=$_GET['id'];
        $library = Library::find($id);
        if ($library == null) {
            return redirect()->intended('life_jim/library');
        }
        //$campus_images = Campus_images::find();
        $library_images=DB::table('library_images')->where('library_id', '=', $id)->get();

        return view('life/library/edit', ['library' => $library,'library_images'=>$library_images]);
    }


    public function update_library(Request $request){
        $id=$_GET['id'];
        $library = Library::findOrFail($id);
        $library_images = new Library_images();
        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        $insert_array=array();
        Library::where('id', $id)
        ->update($input);
        $images = $request->file('attachment');
        if ($request->hasFile('attachment')) {
            $library_images::where('library_id', $id)->delete();
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/library/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
                $file_name = "library_" . $key.time() . '.' . $file->getClientOriginalExtension();
                $file->move(base_path() . '/public/images/library/', $file_name);
              
                $insert_array[]=array(
                    'library_id'=>$id,
                    'images'=>'/images/library/'. $file_name,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                );
                }
                DB::table('library_images')->insert($insert_array);
        }
        
       
        return redirect()->intended('life_jim/library');
    }

    public function destroy_library(Request $request){
        $id=$_GET['id'];
        $library = Library::find($id);
        $library->delete();
        $library_images = new Library_images();
        $library_images::where('library_id', $id)->delete();
        return redirect()->intended('life_jim/library');
    }



    public function auditorium(){
        $auditorium=DB::table('auditorium')
        ->select("*")
        //->join('campus_images','campus_images.campus_id','=','campus.id')
        // ->join("faculty_master as fm","fm.id",'=','ca.faculty')
        ->paginate(5);
        return view("life/auditorium/show",["auditorium"=>$auditorium]);
    }

    public function create_auditorium(){
        $auditorium = Auditorium::all();
        return view('life/auditorium/create',['auditorium' => $auditorium]);
    }

    public function store_auditorium(Request $request){
        $auditorium = new Auditorium();
        $auditorium_images = new Auditorium_images();
        $images = $request->file('attachment');
        $auditorium->title=$request->input('title');
        $auditorium->content=$request->input('content');
        $auditorium->save();
        $insert_id=$auditorium->id;

        if ($request->hasFile('attachment')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/library/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
            $file_name = "auditorium_" . $key.time() . '.' . $file->getClientOriginalExtension();
            $file->move(base_path() . '/public/images/auditorium/', $file_name);
          
            $insert_array[]=array(
                'auditorium_id'=>$insert_id,
                'images'=>'/images/auditorium/'. $file_name,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            );
            }
            DB::table('auditorium_images') -> insert($insert_array);
        }
        
        return redirect()->intended('life_jim/auditorium');
    }


    public function edit_auditorium(Request $request){
        $id=$_GET['id'];
        $auditorium = Auditorium::find($id);
        if ($auditorium == null) {
            return redirect()->intended('life_jim/auditorium');
        }
        //$campus_images = Campus_images::find();
        $auditorium_images=DB::table('auditorium_images')->where('auditorium_id', '=', $id)->get();

        return view('life/auditorium/edit', ['auditorium' => $auditorium,'auditorium_images'=>$auditorium_images]);
    }


    public function update_auditorium(Request $request){
        $id=$_GET['id'];
        $auditorium = Auditorium::findOrFail($id);
        $auditorium_images = new Auditorium_images();
        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        $insert_array=array();
        Auditorium::where('id', $id)
        ->update($input);
        $images = $request->file('attachment');
        if ($request->hasFile('attachment')) {
            $auditorium_images::where('auditorium_id', $id)->delete();
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/auditorium/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
                $file_name = "auditorium_" . $key.time() . '.' . $file->getClientOriginalExtension();
                $file->move(base_path() . '/public/images/auditorium/', $file_name);
              
                $insert_array[]=array(
                    'auditorium_id'=>$id,
                    'images'=>'/images/auditorium/'. $file_name,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                );
                }
                DB::table('auditorium_images')->insert($insert_array);
        }
        
       
        return redirect()->intended('life_jim/auditorium');
    }

    public function destroy_auditorium(Request $request){
        $id=$_GET['id'];
        $auditorium = Auditorium::find($id);
        $auditorium->delete();
        $auditorium_images = new Auditorium_images();
        $auditorium_images::where('auditorium_id', $id)->delete();
        return redirect()->intended('life_jim/auditorium');
    }



    public function board_room(){
        $board_room=DB::table('board_room')
        ->select("*")
        //->join('campus_images','campus_images.campus_id','=','campus.id')
        // ->join("faculty_master as fm","fm.id",'=','ca.faculty')
        ->paginate(5);
        return view("life/board_room/show",["board_room"=>$board_room]);
    }

    public function create_board_room(){
        $board_room = Board_room::all();
        return view('life/board_room/create',['board_room' => $board_room]);
    }

    public function store_board_room(Request $request){
        $board_room = new Board_room();
        $board_room_images = new Board_room_images();
        $images = $request->file('attachment');
        $board_room->title=$request->input('title');
        $board_room->content=$request->input('content');
        $board_room->save();
        $insert_id=$board_room->id;

        if ($request->hasFile('attachment')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/board_room/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
            $file_name = "board_room_" . $key.time() . '.' . $file->getClientOriginalExtension();
            $file->move(base_path() . '/public/images/board_room/', $file_name);
          
            $insert_array[]=array(
                'board_id'=>$insert_id,
                'images'=>'/images/board_room/'. $file_name,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            );
            }
            DB::table('board_room_images') -> insert($insert_array);
        }
        
        return redirect()->intended('life_jim/board_room');
    }


    public function edit_board_room(Request $request){
        $id=$_GET['id'];
        $board_room = Board_room::find($id);
        if ($board_room == null) {
            return redirect()->intended('life_jim/board_room');
        }
        //$campus_images = Campus_images::find();
        $board_room_images=DB::table('board_room_images')->where('board_id', '=', $id)->get();

        return view('life/board_room/edit', ['board_room' => $board_room,'board_room_images'=>$board_room_images]);
    }


    public function update_board_room(Request $request){
        $id=$_GET['id'];
        $board_room = Board_room::findOrFail($id);
        $board_room_images = new Board_room_images();
        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        $insert_array=array();
        board_room::where('id', $id)
        ->update($input);
        $images = $request->file('attachment');
        if ($request->hasFile('attachment')) {
            $board_room_images::where('board_id', $id)->delete();
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/board_room/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
                $file_name = "board_room_" . $key.time() . '.' . $file->getClientOriginalExtension();
                $file->move(base_path() . '/public/images/board_room/', $file_name);
              
                $insert_array[]=array(
                    'board_id'=>$id,
                    'images'=>'/images/board_room/'. $file_name,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                );
                }
                DB::table('board_room_images')->insert($insert_array);
        }
        
       
        return redirect()->intended('life_jim/board_room');
    }

    public function destroy_board_room(Request $request){
        $id=$_GET['id'];
        $board_room = Board_room::find($id);
        $board_room->delete();
        $board_room_images = new Board_room_images();
        $board_room_images::where('board_id', $id)->delete();
        return redirect()->intended('life_jim/board_room');
    }


    public function hostels(){
        $hostels=DB::table('hostel')
        ->select("*")
        //->join('campus_images','campus_images.campus_id','=','campus.id')
        // ->join("faculty_master as fm","fm.id",'=','ca.faculty')
        ->paginate(5);
        return view("life/hostel/show",["hostel"=>$hostels]);
    }

    public function create_hostels(){
        $hostel = Hostels::all();
        return view('life/hostel/create',['hostel' => $hostel]);
    }

    public function store_hostels(Request $request){
        $hostel = new Hostels();
        $Hostel_images = new Hostel_images();
        $images = $request->file('attachment');
        $hostel->title=$request->input('title');
        $hostel->content=$request->input('content');
        $hostel->save();
        $insert_id=$hostel->id;

        if ($request->hasFile('attachment')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/hostel/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
            $file_name = "hostel_" . $key.time() . '.' . $file->getClientOriginalExtension();
            $file->move(base_path() . '/public/images/hostel/', $file_name);
          
            $insert_array[]=array(
                'hostel_id'=>$insert_id,
                'images'=>'/images/hostel/'. $file_name,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            );
            }
            DB::table('hostel_images') -> insert($insert_array);
        }
        
        return redirect()->intended('life_jim/hostels');
    }


    public function edit_hostels(Request $request){
        $id=$_GET['id'];
        $hostel = Hostels::find($id);
        if ($hostel == null) {
            return redirect()->intended('life_jim/hostel');
        }
        //$campus_images = Campus_images::find();
        $hostel_images=DB::table('hostel_images')->where('hostel_id', '=', $id)->get();

        return view('life/hostel/edit', ['hostel' => $hostel,'hostel_images'=>$hostel_images]);
    }


    public function update_hostels(Request $request){
        $id=$_GET['id'];
        $hostel = Hostels::findOrFail($id);
        $Hostel_images = new Hostel_images();
        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        $insert_array=array();
        Hostels::where('id', $id)
        ->update($input);
        $images = $request->file('attachment');
        if ($request->hasFile('attachment')) {
            $Hostel_images::where('hostel_id', $id)->delete();
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/hostel/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
                $file_name = "hostel_" . $key.time() . '.' . $file->getClientOriginalExtension();
                $file->move(base_path() . '/public/images/hostel/', $file_name);
              
                $insert_array[]=array(
                    'hostel_id'=>$id,
                    'images'=>'/images/hostel/'. $file_name,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                );
                }
                DB::table('hostel_images')->insert($insert_array);
        }
        
       
        return redirect()->intended('life_jim/hostels');
    }

    public function destroy_hostels(Request $request){
        $id=$_GET['id'];
        $hostel = Hostels::find($id);
        $hostel->delete();
        $hostel_images = new Hostel_images();
        $hostel_images::where('hostel_id', $id)->delete();
        return redirect()->intended('life_jim/hostels');
    }




    public function wifi(){
        $wifi=DB::table('wifi')
        ->select("*")
        //->join('campus_images','campus_images.campus_id','=','campus.id')
        // ->join("faculty_master as fm","fm.id",'=','ca.faculty')
        ->paginate(5);
        return view("life/wifi/show",["wifi"=>$wifi]);
    }

    public function create_wifi(){
        $wifi = Wifi_campus::all();
        return view('life/wifi/create',['wifi' => $wifi]);
    }

    public function store_wifi(Request $request){
        $wifi = new Wifi_campus();
        $wifi_images = new Wifi_campus_images();
        $images = $request->file('attachment');
        $wifi->title=$request->input('title');
        $wifi->content=$request->input('content');
        $wifi->save();
        $insert_id=$wifi->id;

        if ($request->hasFile('attachment')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/wifi/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
            $file_name = "wifi_" . $key.time() . '.' . $file->getClientOriginalExtension();
            $file->move(base_path() . '/public/images/wifi/', $file_name);
          
            $insert_array[]=array(
                'wifi_id'=>$insert_id,
                'images'=>'/images/wifi/'. $file_name,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            );
            }
            DB::table('wifi_images') -> insert($insert_array);
        }
        
        return redirect()->intended('life_jim/wifi');
    }


    public function edit_wifi(Request $request){
        $id=$_GET['id'];
        $wifi = Wifi_campus::find($id);
        if ($wifi == null) {
            return redirect()->intended('life_jim/wifi');
        }
        //$campus_images = Campus_images::find();
        $wifi_images=DB::table('wifi_images')->where('wifi_id', '=', $id)->get();

        return view('life/wifi/edit', ['wifi' => $wifi,'wifi_images'=>$wifi_images]);
    }


    public function update_wifi(Request $request){
        $id=$_GET['id'];
        $wifi = Wifi_campus::findOrFail($id);
        $wifi_images = new Wifi_campus_images();
        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        $insert_array=array();
        Wifi_campus::where('id', $id)
        ->update($input);
        $images = $request->file('attachment');
        if ($request->hasFile('attachment')) {
            $wifi_images::where('wifi_id', $id)->delete();
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/wifi/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
                $file_name = "wifi_" . $key.time() . '.' . $file->getClientOriginalExtension();
                $file->move(base_path() . '/public/images/wifi/', $file_name);
              
                $insert_array[]=array(
                    'wifi_id'=>$id,
                    'images'=>'/images/wifi/'. $file_name,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                );
                }
                DB::table('wifi_images')->insert($insert_array);
        }
        
       
        return redirect()->intended('life_jim/wifi');
    }

    public function destroy_wifi(Request $request){
        $id=$_GET['id'];
        $wifi = Wifi_campus::find($id);
        $wifi->delete();
        $wifi_images = new Wifi_campus_images();
        $wifi_images::where('wifi_id', $id)->delete();
        return redirect()->intended('life_jim/wifi');
    }



    public function student(){
        $student=DB::table('student_affinities')
        ->select("*")
        //->join('campus_images','campus_images.campus_id','=','campus.id')
        // ->join("faculty_master as fm","fm.id",'=','ca.faculty')
        ->paginate(5);
        return view("life/student/show",["student"=>$student]);
    }

    public function create_student(){
        $student = Student_affinities::all();
        return view('life/student/create',['student' => $student]);
    }

    public function store_student(Request $request){
        $student = new Student_affinities();
        $student_images = new Student_affinities_images();
        $images = $request->file('attachment');
        $student->title=$request->input('title');
        $student->content=$request->input('content');
        $student->save();
        $insert_id=$student->id;

        if ($request->hasFile('attachment')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/student/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
            $file_name = "student_" . $key.time() . '.' . $file->getClientOriginalExtension();
            $file->move(base_path() . '/public/images/student/', $file_name);
          
            $insert_array[]=array(
                'student_id'=>$insert_id,
                'images'=>'/images/student/'. $file_name,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            );
            }
            DB::table('student_affinities_images') -> insert($insert_array);
        }
        
        return redirect()->intended('life_jim/student');
    }


    public function edit_student(Request $request){
        $id=$_GET['id'];
        $student = Student_affinities::find($id);
        if ($student == null) {
            return redirect()->intended('life_jim/student');
        }
        //$campus_images = Campus_images::find();
        $student_images=DB::table('student_affinities_images')->where('student_id', '=', $id)->get();

        return view('life/student/edit', ['student' => $student,'student_images'=>$student_images]);
    }


    public function update_student(Request $request){
        $id=$_GET['id'];
        $student = Student_affinities::findOrFail($id);
        $student_images = new Student_affinities_images();
        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        $insert_array=array();
        Student_affinities::where('id', $id)
        ->update($input);
        $images = $request->file('attachment');
        if ($request->hasFile('attachment')) {
            $student_images::where('student_id', $id)->delete();
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/student/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
                $file_name = "student_" . $key.time() . '.' . $file->getClientOriginalExtension();
                $file->move(base_path() . '/public/images/student/', $file_name);
              
                $insert_array[]=array(
                    'student_id'=>$id,
                    'images'=>'/images/student/'. $file_name,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                );
                }
                DB::table('student_affinities_images')->insert($insert_array);
        }
        
       
        return redirect()->intended('life_jim/student');
    }

    public function destroy_student(Request $request){
        $id=$_GET['id'];
        $student = Student_affinities::find($id);
        $student->delete();
        $student_images = new Student_affinities_images();
        $student_images::where('student_id', $id)->delete();
        return redirect()->intended('life_jim/student');
    }



    public function research(){
        $research=DB::table('research_room')
        ->select("*")
        //->join('campus_images','campus_images.campus_id','=','campus.id')
        // ->join("faculty_master as fm","fm.id",'=','ca.faculty')
        ->paginate(5);
        return view("life/research/show",["research"=>$research]);
    }

    public function create_research(){
        $research = Research_room::all();
        return view('life/research/create',['research' => $research]);
    }

    public function store_research(Request $request){
        $research = new Research_room();
        $research_images = new Research_room_images();
        $images = $request->file('attachment');
        $research->title=$request->input('title');
        $research->content=$request->input('content');
        $research->save();
        $insert_id=$research->id;

        if ($request->hasFile('attachment')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/research/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
            $file_name = "research_" . $key.time() . '.' . $file->getClientOriginalExtension();
            $file->move(base_path() . '/public/images/research/', $file_name);
          
            $insert_array[]=array(
                'research_id'=>$insert_id,
                'images'=>'/images/research/'. $file_name,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            );
            }
            DB::table('research_room_images') -> insert($insert_array);
        }
        
        return redirect()->intended('life_jim/research');
    }


    public function edit_research(Request $request){
        $id=$_GET['id'];
        $research = Research_room::find($id);
        if ($research == null) {
            return redirect()->intended('life_jim/research');
        }
        //$campus_images = Campus_images::find();
        $research_images=DB::table('research_room_images')->where('research_id', '=', $id)->get();

        return view('life/research/edit', ['research' => $research,'research_images'=>$research_images]);
    }


    public function update_research(Request $request){
        $id=$_GET['id'];
        $research = Research_room::findOrFail($id);
        $research_images = new Research_room_images();
        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        $insert_array=array();
        Research_room::where('id', $id)
        ->update($input);
        $images = $request->file('attachment');
        if ($request->hasFile('attachment')) {
            $research_images::where('research_id', $id)->delete();
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/research/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
                $file_name = "research_" . $key.time() . '.' . $file->getClientOriginalExtension();
                $file->move(base_path() . '/public/images/research/', $file_name);
              
                $insert_array[]=array(
                    'research_id'=>$id,
                    'images'=>'/images/research/'. $file_name,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                );
                }
                DB::table('research_room_images')->insert($insert_array);
        }
        
       
        return redirect()->intended('life_jim/research');
    }

    public function destroy_research(Request $request){
        $id=$_GET['id'];
        $research = Research_room::find($id);
        $research->delete();
        $research_images = new Research_room_images();
        $research_images::where('research_id', $id)->delete();
        return redirect()->intended('life_jim/research');
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
