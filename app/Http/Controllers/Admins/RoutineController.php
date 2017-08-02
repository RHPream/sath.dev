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
    public function create($id)
    {
        $classes = UserClass::where('id',$id);
        return view('admin.routine.create',compact('classes','id'));
    }
    public function classWise($id)
    {
        $routines = UserRoutine::where('class_id',$id)->get();
        $class = UserClass::where('id',$id)->firstOrFail()->name;
        return view('admin.routine.index',compact('routines','class','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'class_id' => $request->class_id,
            'one' => $request->one,
            'two' => $request->two,
            'three' => $request->three,
            'four' => $request->four,
            'five' => $request->five,
            'six' => $request->six,
        ];
        UserRoutine::create($data);

        return $this->classWise($request->class_id);
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
        $routine = UserRoutine::where('id',$id)->firstOrFail();
        return view('admin.routine.edit',compact('routine'));
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
        $data = [
            'class_id' => $request->class_id,
            'one' => $request->one,
            'two' => $request->two,
            'three' => $request->three,
            'four' => $request->four,
            'five' => $request->five,
            'six' => $request->six,
        ];
        $routine = UserRoutine::where('id',$id)->firstOrFail();
        $routine->update($data);
        return $this->classWise($id);
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
    public function lecture(){

    }
}
