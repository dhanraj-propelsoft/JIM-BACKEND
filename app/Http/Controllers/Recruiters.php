<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use App\Recruiters_model;
use App\Recruiters_image;

class Recruiters extends Controller
{

    public function index(){
        $recruiters=DB::table('recruiters')
        ->select("*")
        //->join('campus_images','campus_images.campus_id','=','campus.id')
        // ->join("faculty_master as fm","fm.id",'=','ca.faculty')
        ->paginate(5);
        return view("recruiters/show",["recruiters"=>$recruiters]);
    }

    public function create_recruiters(){
        $recruiters = Recruiters_model::all();
        return view('recruiters/create',['recruiters' => $recruiters]);
    }

    public function store_recruiters(Request $request){
        $recruiters = new Recruiters_model();
        $recruiters_images = new Recruiters_image();
        $images = $request->file('attachment');
        $recruiters->title=$request->input('title');
        $recruiters->content=$request->input('content');
        $recruiters->save();
        $insert_id=$recruiters->id;

        if ($request->hasFile('attachment')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/recruiters/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
            $file_name = "recruiters_" . $key.time() . '.' . $file->getClientOriginalExtension();
            $file->move(base_path() . '/public/images/recruiters/', $file_name);
          
            $insert_array[]=array(
                'recruiters_id'=>$insert_id,
                'images'=>'/images/recruiters/'. $file_name,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            );
            }
            DB::table('recruiters_images') -> insert($insert_array);
        }
        
        return redirect()->intended('recruiters/index');
    }


    public function edit_recruiters(Request $request){
        $id=$_GET['id'];
        $recruiters = Recruiters_model::find($id);
        if ($recruiters == null) {
            return redirect()->intended('recruiters/index');
        }
        //$campus_images = Campus_images::find();
        $recruiters_images=DB::table('recruiters_images')->where('recruiters_id', '=', $id)->get();

        return view('recruiters/edit', ['recruiters' => $recruiters,'recruiters_images'=>$recruiters_images]);
    }


    public function update_recruiters(Request $request){
        $id=$_GET['id'];
        $recruiters = Recruiters_model::findOrFail($id);
        $recruiters_images = new Recruiters_image();
        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        $insert_array=array();
        Recruiters_model::where('id', $id)
        ->update($input);
        $images = $request->file('attachment');
        if ($request->hasFile('attachment')) {
            $recruiters_images::where('recruiters_id', $id)->delete();
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/recruiters/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            foreach ($images as $key=>$file) {
              
                $file_name = "recruiters_" . $key.time() . '.' . $file->getClientOriginalExtension();
                $file->move(base_path() . '/public/images/recruiters/', $file_name);
              
                $insert_array[]=array(
                    'recruiters_id'=>$id,
                    'images'=>'/images/recruiters/'. $file_name,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                );
                }
                DB::table('recruiters_images')->insert($insert_array);
        }
        
       
        return redirect()->intended('recruiters/index');
    }

    public function destroy_recruiters(Request $request){
        $id=$_GET['id'];
        $recruiters = Recruiters_model::find($id);
        $recruiters->delete();
        $recruiters_images = new Recruiters_image();
        $recruiters_images::where('recruiters_id', $id)->delete();
        return redirect()->intended('recruiters/index');
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
