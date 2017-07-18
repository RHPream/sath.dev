<?php

namespace App\Http\Controllers\Admins;

use App\Models\Subject;
use App\Models\UserClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();

        return view('admin.subject.index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = UserClass::all();
        return view('admin.subject.create',compact('classes'));
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
            'name'=>'required',
            'class'=>'required',
            'origin'=>'required',
            'description'=>'required',
            'slug'=>'required',
        ]);
        $subject = Subject::create(['name'=>$request->name,'class'=>$request->class,'origin'=>$request->origin,'description'=>$request->description,'slug'=>$request->slug]);

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
        $subject = Subject::find($id);
        $classes = UserClass::all();
        return view('admin.subject.edit',compact('subject','classes'));
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
            'name'=>'required',
            'class'=>'required',
            'origin'=>'required',
            'description'=>'required',
            'slug'=>'required',
        ]);
        $data = [
            'name'=>$request->name,
            'class'=>$request->class,
            'origin'=>$request->origin,
            'description'=>$request->description,
            'slug'=>$request->slug,
        ];
        $subject = Subject::where('id',$id)->first();
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
        Subject::where('id',$id)->delete();
        return back();
    }
}
