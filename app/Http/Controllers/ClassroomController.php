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
    {
        $data=[
        'className' =>$request->className,
        'capacity' =>$request-> capacity,
        'is_fulled'=>isset($request->is_fulled),
        'price'=>$request->price,
        'time_from'=>$request->time_from,
        'time_to'=>$request-> time_to,
               ];
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
       $data=[
             'className' =>$request->className,
             'capacity' =>$request-> capacity,
             'is_fulled'=>isset($request->is_fulled),
             'price'=>$request->price,
             'time_from'=>$request->time_from,
             'time_to'=>$request-> time_to,
             ];
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
}
    
   