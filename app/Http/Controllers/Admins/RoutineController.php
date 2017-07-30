<?php

namespace App\Http\Controllers\Admins;

use App\Models\Routine;
use App\Models\Subject;
use App\Models\UserClass;
use App\Models\UserRoutine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = UserClass::all();
        return view('admin.routine.classwise',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('admin.routine.create',compact('subjects'));
    }
    public function classWise($id)
    {
        $routines = UserRoutine::where('class_id',$id)->get();
        $class = UserClass::where('id',$id)->firstOrFail()->name;
        return view('admin.routine.index',compact('routines','class'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'subject_id'=>'required',
            'description'=>'required',
        ]);
        $subject = Routine::create(['subject_id'=>$request->subject_id,'description'=>$request->description]);

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subjects = Subject::all();
        $routine = Routine::find($id);
        return view('admin.routine.edit',compact('routine','subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'subject_id'=>'required',
            'description'=>'required',
        ]);
        $data = [
            'subject_id'=>$request->subject_id,
            'description'=>$request->description,
        ];
        $subject = Routine::where('id',$id)->first();
        $subject->update($data);
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Routine::where('id',$id)->delete();
        return back();
    }
}
