<?php

namespace App\Http\Controllers\Academics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

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
            return view("academics/Learning/Learning");
        }
    public function ResearchDetail()
    {
        return view("academics/Research/Research");
    }
}
