<?php

namespace App\Http\Controllers\Admins;

use App\Models\Chapter;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapters = Chapter::all();

        return view('admin.chapter.index',compact('chapters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('admin.chapter.create',compact('subjects'));
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
            'description'=>'required',
            'slug'=>'required',
        ]);
        $chapter = Chapter::create(['name'=>$request->name,'subject_id'=>$request->subject_id,'description'=>$request->description,'slug'=>$request->slug]);

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
        $chapter = Chapter::find($id);
        $subjects = Subject::all();
        return view('admin.chapter.edit',compact('chapter','subjects'));
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
            'description'=>'required',
            'slug'=>'required',
        ]);
        $data = [
            'name'=>$request->name,
            'subject_id'=>$request->subject_id,
            'description'=>$request->description,
            'slug'=>$request->slug,
        ];
        $chapter = Chapter::where('id',$id)->first();
        $chapter->update($data);
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
        Chapter::where('id',$id)->delete();
        return back();
    }
}
