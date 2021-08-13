<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Eligiblity;
use App\Enterance;
use App\Criteria;
use App\Shortlisting;
use App\Documents;
use App\Online_application;
use App\Hostel;
use File;

class Admission extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function eligiblity(){
        $eligiblity=DB::table('admission_eligiblity')
        ->select("*")
        ->paginate(5);
        return view("admission/eligiblity/show",["eligiblity"=>$eligiblity]);
    }


    public function shortlisting(){
        $short=DB::table('admission_shortlisting')
        ->select("*")
        ->paginate(5);
        return view("admission/shortlist/show",["short"=>$short]);
    }

    public function create_eligiblity(){
        return view('admission/eligiblity/create');
    }


    


    public function store_eligiblity(Request $request){
        $eligiblity = new Eligiblity();
        $eligiblity->title=$request->input('title');
        $eligiblity->content=$request->input('content');
        $eligiblity->status=1;
        $eligiblity->save();
        return redirect()->intended('admission/eligiblity');
    }


    public function edit_eligiblity(Request $request){
        $id=$_GET['id'];
        $eligiblity = Eligiblity::find($id);
        if ($eligiblity == null) {
            return redirect()->intended('home-page/main_slider');
        }

        return view('admission/eligiblity/edit', ['eligiblity' => $eligiblity]);
    }



    public function update_eligiblity(Request $request){
        $id=$_GET['id'];
        $eligiblity = Eligiblity::findOrFail($id);
        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        Eligiblity::where('id', $id)
        ->update($input);
        return redirect()->intended('admission/eligiblity');
    }



    public function destroy_eligiblity(Request $request){
        $id=$_GET['id'];
        $eligiblity = Eligiblity::find($id);
        $eligiblity->delete();
        return redirect()->intended('admission/eligiblity');
    }


    public function enterance_test(){
        $enterance=DB::table('admission_enterance')
        ->select("*")
        ->paginate(5);
        return view("admission/enterance/show",["enterance"=>$enterance]);
    }

    public function create_enterance_test(){
        return view('admission/enterance/create');
    }


    public function store_enterance_test(Request $request){
        //return $request->all();
        $enterance = new Enterance();
        $enterance->title=$request->input('title');
        $enterance->content=$request->input('content');
        $enterance->status=1;
        $enterance->save();
        return redirect()->intended('admission/enterance_test');
    }


    public function edit_enterance_test(Request $request){
        $id=$_GET['id'];
        $enterance = Enterance::find($id);
        if ($enterance == null) {
            return redirect()->intended('admission/enterance_test');
        }

        return view('admission/enterance/edit', ['enterance' => $enterance]);
    }



    public function update_enterance_test(Request $request){
        $id=$_GET['id'];
        $enterance = Enterance::findOrFail($id);
        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        Enterance::where('id', $id)
        ->update($input);
        return redirect()->intended('admission/enterance_test');
    }



    public function destroy_enterance_test(Request $request){
        $id=$_GET['id'];
        $enterance = Enterance::find($id);
        $enterance->delete();
        return redirect()->intended('admission/enterance_test');
    }


    public function criteria(){
        $criteria=DB::table('admission_criteria')
        ->select("*")
        ->paginate(5);
        return view("admission/criteria/show",["criteria"=>$criteria]);
    }

    public function create_criteria(){
        return view('admission/criteria/create');
    }


    public function store_criteria(Request $request){
        //return $request->all();
        $criteria = new Criteria();
        $criteria->title=$request->input('title');
        $criteria->content=$request->input('content');
        $criteria->status=1;
        $criteria->save();
        return redirect()->intended('admission/criteria');
    }


    public function edit_criteria(Request $request){
        $id=$_GET['id'];
        $criteria = Criteria::find($id);
        if ($criteria == null) {
            return redirect()->intended('admission/criteria');
        }

        return view('admission/criteria/edit', ['criteria' => $criteria]);
    }



    public function update_criteria(Request $request){
        $id=$_GET['id'];
        $criteria = Criteria::findOrFail($id);
        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        Criteria::where('id', $id)
        ->update($input);
        return redirect()->intended('admission/criteria');
    }



    public function destroy_criteria(Request $request){
        $id=$_GET['id'];
        $criteria = Criteria::find($id);
        $criteria->delete();
        return redirect()->intended('admission/criteria');
    }





    public function create_shortlisting(){
        return view('admission/shortlist/create');
    }


    public function store_shortlisting(Request $request){
        //return $request->all();
        $criteria = new Shortlisting();
        $criteria->title=$request->input('title');
        $criteria->content=$request->input('content');
        $criteria->status=1;
        $criteria->save();
        return redirect()->intended('admission/shortlisting');
    }


    public function edit_shortlisting(Request $request){
        $id=$_GET['id'];
        $short = Shortlisting::find($id);
        if ($short == null) {
            return redirect()->intended('admission/shortlisting');
        }

        return view('admission/shortlist/edit', ['short' => $short]);
    }



    public function update_shortlisting(Request $request){
        $id=$_GET['id'];
        $short = Shortlisting::findOrFail($id);
        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        Shortlisting::where('id', $id)
        ->update($input);
        return redirect()->intended('admission/shortlisting');
    }



    public function destroy_shortlisting(Request $request){
        $id=$_GET['id'];
        $short = Shortlisting::find($id);
        $short->delete();
        return redirect()->intended('admission/shortlisting');
    }



    public function documents(){
        $documents=DB::table('supporting_documents')
        ->select("*")
        ->paginate(5);
        return view("admission/documents/show",["documents"=>$documents]);
    }

    public function create_documents(){
        return view('admission/documents/create');
    }


    public function store_documents(Request $request){
        //return $request->all();
        $documents = new Documents();
        if ($request->hasFile('attachment')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/course_allotment/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            $image = $request->file('attachment');
            $file_name = "course_" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/images/course_allotment/', $file_name);
            $documents->attachment = '/images/course_allotment/'. $file_name;
        }

        $documents->title=$request->input('title');
        $documents->content=$request->input('content');
        $documents->status=1;
        $documents->save();
        return redirect()->intended('admission/documents');
    }


    public function edit_documents(Request $request){
        $id=$_GET['id'];
        $document = Documents::find($id);
        if ($document == null) {
            return redirect()->intended('admission/criteria');
        }

        return view('admission/documents/edit', ['documents' => $document]);
    }



    public function update_documents(Request $request){
        $id=$_GET['id'];
        $document = Documents::findOrFail($id);

       
        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        if ($request->hasFile('attachment')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/course_allotment/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            $image = $request->file('attachment');
            $file_name = "infocus_" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/images/course_allotment/', $file_name);
            $input['attachment'] = '/images/course_allotment/'. $file_name;
        }

        Documents::where('id', $id)
        ->update($input);
        return redirect()->intended('admission/documents');
    }



    public function destroy_documents(Request $request){
        $id=$_GET['id'];
        $documents = Documents::find($id);
        $documents->delete();
        return redirect()->intended('admission/documents');
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


