<?php

namespace App\Http\Controllers;
use App\Settings_model;

use Illuminate\Http\Request;

class Settings extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $settings = Settings_model::find(1);
        return view('settings/show',['settings'=>$settings]);
    }


    public function store(Request $request){
        $settings = new Settings_model();
        if ($request->hasFile('picture')) {
              // $path=base_path() . '/images/main_sliders/';
              $path='/public/images/settings/';
              // if (!file_exists($path)) {
              // $result = File::makeDirectory($path, 0777, true);
              // }
              $image = $request->file('picture');
              $file_name = "settings_" . time() . '.' . $image->getClientOriginalExtension();
              $image->move(base_path() . '/public/images/settings/', $file_name);
              $settings->logo = '/images/settings/'. $file_name;
          }

          $settings->email=$request->input('email');
          $settings->phone=$request->input('phone');
          $settings->face_book=$request->input('facebook');
          $settings->youtube=$request->input('youtube');
          $settings->twitter=$request->input('twitter');
          $settings->instagram=$request->input('instagram');
          $settings->linked_in=$request->input('linked_in');
          $settings->status=1;
          $settings->save();
          return redirect()->intended('settings');
        // return $request->all();
    }


}
