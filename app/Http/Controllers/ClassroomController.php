<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses=Classroom::get();
        return view('classes',compact('courses'));
       
 
 

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_class');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {//validate to make rules so if the rules dont follow the required validation ;it will not add into database
        $data=$request->validate([
        'className'=>'required|string|max:10',
        'capacity' =>'required|numeric',
        'price'=>'required|numeric',
        'time_from'=>'required|data_format:H:i',
        'time_to'=>'required|data_format:H:i|after:time_from',
               ]);
        $data['is_fulled']=isset($request->is_fulled);
        Classroom::create($data);
        redirect()->route('classes.index');

    }  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        { $course=Classroom::findorfail($id);
            //dd($classes);
            return view('class_details', compact('course')); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit(string $id)
    
    { $course=Classroom::findorfail($id);
        //dd($classes);
        return view('edit_class', compact('course')); 
    }
    
   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       //dd($request,$id);
       $data=$request->validate([
        'className'=>'required|string|max:10',
        'capacity' =>'required|numeric',
        'price'=>'required|numeric',
        'time_from'=>'required',
        'time_to'=>'required|after:time_from',
               ]);
        $data['is_fulled']=isset($request->is_fulled);
        Classroom::where('id',$id)->update($data);
        return redirect()->route('classes.index');
    }
       
      /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Classroom::where('id',$id)->delete();
        return redirect()->route('classes.index');
    }
    public function showDeleted(){

        $courses=Classroom::onlyTrashed()->get();
        return view('trashedclasses',compact('courses'));
    
    }
    public function restore(string $id)
    {
        Classroom::where('id',$id)->restore();
        return redirect()->route('classes.showDeleted');
   
    }
    public function forceDelete (string $id)
    {
        Classroom::where('id',$id)->forceDelete();
        return redirect()->route('classes.showDeleted');

    }
}
    
   