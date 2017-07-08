<?php

namespace App\Http\Controllers\Admins;

use App\Models\Chapter;
use App\Models\Lecture;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lectures = Lecture::all();

        return view('admin.lecture.index',compact('lectures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        $chapters = Chapter::all();
        return view('admin.lecture.create',compact('subjects','chapters'));
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
            'subject_id'=>'required',
            'chapter_id'=>'required',
            'description'=>'required',
            'slug'=>'required',
        ]);
        $lecture = Lecture::create(['name'=>$request->name,'subject_id'=>$request->subject_id,'chapter_id'=>$request->chapter_id,'description'=>$request->description,'slug'=>$request->slug]);

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
        $lecture = Lecture::find($id);
        $subjects = Subject::all();
        $chapters = Chapter::all();
        return view('admin.lecture.edit',compact('lecture','subjects','chapters'));
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
            'subject_id'=>'required',
            'chapter_id'=>'required',
            'description'=>'required',
            'slug'=>'required',
        ]);
        $data = [
            'name'=>$request->name,
            'subject_id'=>$request->subject_id,
            'chapter_id'=>$request->chapter_id,
            'description'=>$request->description,
            'slug'=>$request->slug,
        ];
        $lecture = Lecture::where('id',$id)->first();
        $lecture->update($data);
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
        Lecture::where('id',$id)->delete();
        return back();
    }
    public function getChapter($id)
    {
        return Chapter::where('subject_id',$id)->get();
    }
}
