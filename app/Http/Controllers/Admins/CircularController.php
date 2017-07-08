<?php

namespace App\Http\Controllers\Admins;

use App\Models\Cirular;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CircularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $circulars = Cirular::all();

        return view('admin.circular.index',compact('circulars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universities = University::all();
        return view('admin.circular.create',compact('universities'));
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
            'university'=>'required',
            'type'=>'required',
            'unit'=>'required',
            'marque'=>'required',
            'description'=>'required',
            'link'=>'required',
        ]);
        $data = [
            'university_id'=>$request->university,
            'type'=>$request->type,
            'unit'=>$request->unit,
            'marque'=>$request->marque,
            'description'=>$request->description,
            'link'=>$request->link,
        ];
        //File upload here

        $university = Cirular::create($data);

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
        $universities = University::all();
        $circular = Cirular::where('id',$id)->firstOrFail();
        return view('admin.circular.edit',compact('universities','circular'));
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
            'university'=>'required',
            'type'=>'required',
            'unit'=>'required',
            'marque'=>'required',
            'description'=>'required',
            'link'=>'required',
        ]);
        $data = [
            'university_id'=>$request->university,
            'type'=>$request->type,
            'unit'=>$request->unit,
            'marque'=>$request->marque,
            'description'=>$request->description,
            'link'=>$request->link,
        ];
        //File upload here

        $circular = Cirular::where('id',$id)->first();
        $circular->update($data);
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
        Cirular::where('id',$id)->delete();
        return back();
    }
}
