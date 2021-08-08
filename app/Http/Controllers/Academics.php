<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Academics_model;
use App\Syllabus_docs;
use App\Course_allotment;
use File;

class Academics extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function syllabus(){
        $syllabus=DB::table('syllabus as s')
        ->select("*")
        ->paginate(5);
        return view("academics/syllabus/show",["syllabus"=>$syllabus]);
    }

    public function course_allotment(){
        $course_allotment=DB::table('course_allotment')
        ->select("*")
        ->paginate(5);
        return view("academics/course/show",['course'=>$course_allotment]);
    }


    public function create_syllabus(){
        return view('academics/syllabus/create');
    }

    public function create_course_allotment(){
        return view('academics/course/create');
    }


    public function store_syllabus(Request $request){

        $documents= $request->file('documents');
        $length=count($documents);
        $document_files=array();

        $syllabus = new Academics_model();
      
        $syllabus->name=$request->input('name');
        $syllabus->year=$request->input('year');
        $syllabus->batch=$request->input('batch');
        $syllabus->status=1;
        $syllabus->save();
        $id=$syllabus->id;

        for($i=0;$i<$length;$i++){
            if ($request->hasFile('documents')) {
                // $path=base_path() . '/images/main_sliders/';
                $path='/public/syllabus/';
                // if (!file_exists($path)) {
                // $result = File::makeDirectory($path, 0777, true);
                // }
                $image = $request->file('documents')[$i];
                $file_name = "documents_" . time() . '.' . $image->getClientOriginalExtension();
                $image->move(base_path() . '/public/syllabus/', $file_name);
                $document_files[]=array(
                    'syllabus_id'=>$id,
                    'documents'=>'/syllabus/'. $file_name,
                    'status'=>1,
                );
            }
        }
        Syllabus_docs::insert($document_files);
        return redirect()->intended('academics/syllabus');
    }

    public function store_course_allotment(Request $request){
        $course_allotment = new Course_allotment();
        if ($request->hasFile('documents')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/course_allotment/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            $image = $request->file('documents');
            $file_name = "course_" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/images/course_allotment/', $file_name);
            $course_allotment->documents = '/images/course_allotment/'. $file_name;
        }
        $course_allotment->faculty=$request->input('faculty');
        $course_allotment->semester=$request->input('semester');
        $course_allotment->session=$request->input('session');
        $course_allotment->total=$request->input('total');
        $course_allotment->description=$request->input('description');
        $course_allotment->save();
        return redirect()->intended('academics/course_allotment');
    }


    public function edit_course_allotment(Request $request){
        $id=$_GET['id'];
        $course_allotment = Course_allotment::find($id);
        if ($course_allotment == null) {
            return redirect()->intended('academics/course_allotment');
        }

        return view('academics/course/edit', ['course_allotment' => $course_allotment]);
    }



    public function edit_syllabus(Request $request){
        $id=$_GET['id'];
        $syllabus = Academics_model::find($id);
        if ($syllabus == null) {
            return redirect()->intended('academics/syllabus');
        }

        return view('academics/syllabus/edit', ['syllabus' => $syllabus]);
    }


    public function destroy_syllabus(Request $request){
        $id=$_GET['id'];
        $main_slider = Academics_model::find($id);
        $main_slider->delete();
        return redirect()->intended('academics/syllabus');
    }

    public function destroy_course_allotment(Request $request){
        $id=$_GET['id'];
        $course_allotment = Course_allotment::find($id);
        $course_allotment->delete();
        return redirect()->intended('academics/course_allotment');
    }


    public function update_syllabus(Request $request){
        $id=$_GET['id'];
        $syllabus = Academics_model::findOrFail($id);
        $keys = ['name', 'year','batch'];
        $input = $this->createQueryInput($keys, $request);
        if($request->file('documents')){
        $documents= $request->file('documents');
        $length=count($documents);
        for($i=0;$i<$length;$i++){
            if ($request->hasFile('documents')) {
                Syllabus_docs::where('syllabus_id', $id)->delete();
                // $path=base_path() . '/images/main_sliders/';
                $path='/public/syllabus/';
                // if (!file_exists($path)) {
                // $result = File::makeDirectory($path, 0777, true);
                // }
                $image = $request->file('documents')[$i];
                $file_name = "documents_" . time() . '.' . $image->getClientOriginalExtension();
                $image->move(base_path() . '/public/syllabus/', $file_name);
                $document_files[]=array(
                    'syllabus_id'=>$id,
                    'documents'=>'/syllabus/'. $file_name,
                    'status'=>1,
                );
            }
        }
        Syllabus_docs::insert($document_files);
    }
        Academics_model::where('id', $id)
        ->update($input);
        return redirect()->intended('academics/syllabus');
    }


    public function update_course_allotment(Request $request){
        $id=$_GET['id'];
        $course_allotment = Course_allotment::findOrFail($id);
        $keys = ['faculty', 'semester','session','total','description'];
        $input = $this->createQueryInput($keys, $request);
        if ($request->hasFile('documents')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/course_allotment/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            $image = $request->file('documents');
            $file_name = "course_" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/images/course_allotment/', $file_name);
            $input['documents'] = '/images/course_allotment/'. $file_name;
        }
        Course_allotment::where('id', $id)
        ->update($input);
        return redirect()->intended('academics/course_allotment');
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
