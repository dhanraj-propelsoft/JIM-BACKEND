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
use App\Curriculam;
use App\Fee;
use App\Brochurre;
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

    public function online_application(){
        $documents=DB::table('online_application')
        ->select("*")
        ->paginate(5);
        return view("admission/online/show",["documents"=>$documents]);
    }

    public function create_online_application(){
        return view('admission/online/create');
    }


    public function store_online_application(Request $request){
        //return $request->all();
        $documents = new Online_application();
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
        return redirect()->intended('admission/online_application');
    }


    public function edit_online_application(Request $request){
        $id=$_GET['id'];
        $document = Online_application::find($id);
        if ($document == null) {
            return redirect()->intended('admission/online_application');
        }

        return view('admission/online/edit', ['documents' => $document]);
    }



    public function update_online_application(Request $request){
        $id=$_GET['id'];
        $document = Online_application::findOrFail($id);

       
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

        Online_application::where('id', $id)
        ->update($input);
        return redirect()->intended('admission/online_application');
    }



    public function destroy_online_application(Request $request){
        $id=$_GET['id'];
        $documents = Online_application::find($id);
        $documents->delete();
        return redirect()->intended('admission/online_application');
    }



    public function hostel(){
        $documents=DB::table('hostel_accom')
        ->select("*")
        ->paginate(5);
        return view("admission/hostel/show",["documents"=>$documents]);
    }

    public function create_hostel(){
        return view('admission/hostel/create');
    }


    public function store_hostel(Request $request){
        //return $request->all();
        $documents = new Hostel();
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
        return redirect()->intended('admission/hostel');
    }


    public function edit_hostel(Request $request){
        $id=$_GET['id'];
        $document = Hostel::find($id);
        if ($document == null) {
            return redirect()->intended('admission/hostel');
        }

        return view('admission/hostel/edit', ['documents' => $document]);
    }



    public function update_hostel(Request $request){
        $id=$_GET['id'];
        $document = Hostel::findOrFail($id);

       
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

        Hostel::where('id', $id)
        ->update($input);
        return redirect()->intended('admission/hostel');
    }



    public function destroy_hostel(Request $request){
        $id=$_GET['id'];
        $documents = Hostel::find($id);
        $documents->delete();
        return redirect()->intended('admission/hostel');
    }







    public function curriculum(){
        $documents=DB::table('curriculam')
        ->select("*")
        ->paginate(5);
        return view("admission/curriculam/show",["documents"=>$documents]);
    }

    public function create_curriculum(){
        return view('admission/curriculam/create');
    }


    public function store_curriculum(Request $request){
        //return $request->all();
        $documents = new Curriculam();
        if ($request->hasFile('attachment')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/curriculam/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            $image = $request->file('attachment');
            $file_name = "course_" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/images/curriculam/', $file_name);
            $documents->attachment = '/images/curriculam/'. $file_name;
        }

        $documents->title=$request->input('title');
        $documents->content=$request->input('content');
        $documents->status=1;
        $documents->save();
        return redirect()->intended('admission/curriculum');
    }


    public function edit_curriculum(Request $request){
        $id=$_GET['id'];
        $document = Curriculam::find($id);
        if ($document == null) {
            return redirect()->intended('admission/hostel');
        }

        return view('admission/curriculam/edit', ['documents' => $document]);
    }



    public function update_curriculum(Request $request){
        $id=$_GET['id'];
        $document = Curriculam::findOrFail($id);

       
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

        Curriculam::where('id', $id)
        ->update($input);
        return redirect()->intended('admission/curriculum');
    }



    public function destroy_curriculum(Request $request){
        $id=$_GET['id'];
        $documents = Curriculam::find($id);
        $documents->delete();
        return redirect()->intended('admission/curriculum');
    }




    public function fee(){
        $documents=DB::table('fee')
        ->select("*")
        ->paginate(5);
        return view("admission/fee/show",["documents"=>$documents]);
    }

    public function create_fee(){
        return view('admission/fee/create');
    }


    public function store_fee(Request $request){
        //return $request->all();
        $documents = new Fee();
        if ($request->hasFile('attachment')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/fee/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            $image = $request->file('attachment');
            $file_name = "course_" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/images/fee/', $file_name);
            $documents->attachment = '/images/fee/'. $file_name;
        }

        $documents->title=$request->input('title');
        $documents->content=$request->input('content');
        $documents->status=1;
        $documents->save();
        return redirect()->intended('admission/fee');
    }


    public function edit_fee(Request $request){
        $id=$_GET['id'];
        $document = Fee::find($id);
        if ($document == null) {
            return redirect()->intended('admission/fee');
        }

        return view('admission/fee/edit', ['documents' => $document]);
    }



    public function update_fee(Request $request){
        $id=$_GET['id'];
        $document = Fee::findOrFail($id);

       
        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        if ($request->hasFile('attachment')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/fee/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            $image = $request->file('attachment');
            $file_name = "infocus_" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/images/fee/', $file_name);
            $input['attachment'] = '/images/fee/'. $file_name;
        }

        Fee::where('id', $id)
        ->update($input);
        return redirect()->intended('admission/fee');
    }



    public function destroy_fee(Request $request){
        $id=$_GET['id'];
        $documents = Fee::find($id);
        $documents->delete();
        return redirect()->intended('admission/fee');
    }




    public function brochure(){
        $documents=DB::table('brochure')
        ->select("*")
        ->paginate(5);
        return view("admission/brochure/show",["documents"=>$documents]);
    }

    public function create_brochure(){
        return view('admission/brochure/create');
    }


    public function store_brochure(Request $request){
        //return $request->all();
        $documents = new Brochurre();
        if ($request->hasFile('attachment')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/brochure/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            $image = $request->file('attachment');
            $file_name = "course_" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/images/brochure/', $file_name);
            $documents->attachment = '/images/brochure/'. $file_name;
        }

        $documents->title=$request->input('title');
        $documents->content=$request->input('content');
        $documents->status=1;
        $documents->save();
        return redirect()->intended('admission/brochure');
    }


    public function edit_brochure(Request $request){
        $id=$_GET['id'];
        $document = Brochurre::find($id);
        if ($document == null) {
            return redirect()->intended('admission/brochure');
        }

        return view('admission/brochure/edit', ['documents' => $document]);
    }



    public function update_brochure(Request $request){
        $id=$_GET['id'];
        $document = Brochurre::findOrFail($id);

       
        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        if ($request->hasFile('attachment')) {
            // $path=base_path() . '/images/main_sliders/';
            $path='/public/images/brochure/';
            // if (!file_exists($path)) {
            // $result = File::makeDirectory($path, 0777, true);
            // }
            $image = $request->file('attachment');
            $file_name = "infocus_" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/images/brochure/', $file_name);
            $input['attachment'] = '/images/brochure/'. $file_name;
        }

        Brochurre::where('id', $id)
        ->update($input);
        return redirect()->intended('admission/brochure');
    }



    public function destroy_brochure(Request $request){
        $id=$_GET['id'];
        $documents = Brochurre::find($id);
        $documents->delete();
        return redirect()->intended('admission/brochure');
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


