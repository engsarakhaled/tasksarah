<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
class ExampleController extends Controller
{
    public function content()
    {
        return view('content'); // Return content view
    }

   //public function datatask(Request $request) 
    //{
      //  $data = [
        //    'name' => $request->input('name'),
         //   'email' => $request->input('email'),
         //   'subject' => $request->input('subject'),
          //  'message' => $request->input('message'),
        //];

       

       // return view('datatask', compact('data')); 
   // }
//}
    public function datatask(Request $request)
  {
    return $request['name'].'<br>'.$request['email'] .'<br>'.$request['subject'].'<br>'.$request['message'];  
  }

function uploadform(){
      return view('upload');
}
public function index(){

  return view ('index');
}

public function test(){ //go to student table find the student with id =4 and appear all the data
  dd(DB::table('students')
            ->join('phones', 'phones.id', '=', 'students.phone_id')
            ->where('students.id', '=', 4)
            ->first()
  );

}
}