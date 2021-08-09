<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Eligiblity;
use App\Enterance;
use App\Criteria;
use App\Shortlisting;
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









    private function createQueryInput($keys, $request) {
        $queryInput = [];
        for($i = 0; $i < sizeof($keys); $i++) {
            $key = $keys[$i];
            $queryInput[$key] = $request[$key];
        }

        return $queryInput;
    }




}

