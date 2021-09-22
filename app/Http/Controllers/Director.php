<?php

namespace App\Http\Controllers;

use App\Director_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Directors_model;
use App\Director_images;
class Director extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $director=DB::table('directors_message')
        ->select("*")
        //->join('campus_images','campus_images.campus_id','=','campus.id')
        // ->join("faculty_master as fm","fm.id",'=','ca.faculty')
        ->paginate(5);
        return view("director/show",["director"=>$director]);
    }

    public function create_director(){
        $director = Director_model::all();
        return view('director/create',['director' => $director]);
    }

    public function store_director(Request $request){
        $director = new Director_model();
        $director_images = new Director_images();
        $images = $request->file('attachment');
        $director->title=$request->input('title');
        $director->content=$request->input('content');
        $director->save();
        $insert_id=$director->id;

        if ($request->hasFile('attachment')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/director/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
            $file_name = "director_" . $key.time() . '.' . $file->getClientOriginalExtension();
            $file->move(base_path() . '/public/images/director/', $file_name);
          
            $insert_array[]=array(
                'director_id'=>$insert_id,
                'images'=>'/images/director/'. $file_name,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            );
            }
            DB::table('directors_images') -> insert($insert_array);
        }
        
        return redirect()->intended('director/index');
    }


    public function edit_director(Request $request){
        $id=$_GET['id'];
        $director = Director_model::find($id);
        if ($director == null) {
            return redirect()->intended('director/index');
        }
        //$campus_images = Campus_images::find();
        $director_images=DB::table('directors_images')->where('director_id', '=', $id)->get();

        return view('director/edit', ['director' => $director,'director_images'=>$director_images]);
    }


    public function update_director(Request $request){
        $id=$_GET['id'];
        $director = Director_model::findOrFail($id);
        $director_images = new Director_images();
        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        $insert_array=array();
        Director_model::where('id', $id)
        ->update($input);
        $images = $request->file('attachment');
        if ($request->hasFile('attachment')) {
            $director_images::where('director_id', $id)->delete();
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/director/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
                $file_name = "director_" . $key.time() . '.' . $file->getClientOriginalExtension();
                $file->move(base_path() . '/public/images/director/', $file_name);
              
                $insert_array[]=array(
                    'director_id'=>$id,
                    'images'=>'/images/director/'. $file_name,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                );
                }
                DB::table('directors_images')->insert($insert_array);
        }
        
       
        return redirect()->intended('director/index');
    }

    public function destroy_director(Request $request){
        $id=$_GET['id'];
        $director = Director_model::find($id);
        $director->delete();
        $director_images = new Director_images();
        $director_images::where('director_id', $id)->delete();
        return redirect()->intended('director/index');
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
