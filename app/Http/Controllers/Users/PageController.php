<?php

namespace App\Http\Controllers\Users;

use App\Models\Cirular;
use App\Models\Footer;
use App\Models\HomePage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function welcome()
    {
        $video = HomePage::all()->first();
        $sciences = Cirular::where('type','Science')->get();
        $arts = Cirular::where('type','Arts')->get();
        $commerces = Cirular::where('type','Commerce')->get();
        $commons = Cirular::where('type','Common')->get();
        return view('welcome',compact('video','sciences','arts','commerces','commons'));
    }
}
