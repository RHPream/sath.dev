<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    public function index()
    {
        return view('lecture.subject');
    }
    public function routine()
    {
        return view('lecture.routine');
    }
    public function question()
    {
        return view('exam.varsityQuestion');
    }
}
