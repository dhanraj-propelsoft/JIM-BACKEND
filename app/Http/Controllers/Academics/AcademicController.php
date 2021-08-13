<?php

namespace App\Http\Controllers\Academics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use App\Learning;

class AcademicController extends Controller
{
    public function MBADetail()
    {
        return view("academics/MBA/MBADetails");
    }
    public function PhdDetail()
    {
        return view("academics/PHD/PhdDetail");
    }
    public function LearningDetail()
    {
        // $learning = DB::table('learning')
        //     ->select("*")
        //     ->paginate(5);
            $learning = Learning::find(1);
        return view("academics/Learning/Learning", ["learning" => $learning]);
    }

    public function store_learning(Request $request)
    {

        $res=Learning::query()->truncate();

        $learn = new Learning();

        $learn->communication_course = $request->input('communication_course');
        $learn->bridge_course = $request->input('bridge_course');
        $learn->personal_growth_lab = $request->input('personal_growth_lab');
        $learn->skill_enhancements = $request->input('skill_enhancements');
        $learn->indian_institute_interface = $request->input('indian_institute_interface');
        $learn->learning_assest = $request->input('learning_assest');
        $learn->learning_academy = $request->input('learning_academy');
        $learn->industrial_training = $request->input('industrial_training');
        $learn->social_involvement = $request->input('social_involvement');

        $learn->save();
        return redirect()->intended('Academics/learningDetails');
    }

    public function ResearchDetail()
    {
        return view("academics/Research/Research");
    }
}
