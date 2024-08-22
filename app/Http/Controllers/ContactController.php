<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactUS;
use App\Mail\ContactFormMail;
use Dotenv\Dotenv; //a popular tool used to load environment variables from a .env file into your application.

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function contactUS()
     {
      
         session()->put('test', 'First Laravel session');
                return view('contactUS');
     }

    // public function contactUSPost(Request $request) //i found to ways this way dont use ContactForm but it didnt work 
   //   {//also i think it is not the best practice
   //  $data = $request->validate([
     //   'name' => 'required',
      //  'email' => 'required|email',
       // 'message' => 'required',
      //  'subject' => 'required',
    //  ]);
    //dd($data);
  //   Dotenv::createImmutable(base_path())->load();
   //  $mailFromAddress = env('MAIL_FROM_ADDRESS');
   //  $recipientEmail = env('RECIPIENT_EMAIL'); // Access recipient email from .env

   //  Mail::send('email' ,$data, function ($message) use ($data,$recipientEmail) {
     //   $message->from(env('MAIL_FROM_ADDRESS'));
     //   $message->to($recipientEmail, 'Admin')->subject('hello!');
     //   return view('email', compact('data'));
        
   // });
   //   }
    
  //This line loads environment variables from a file named .env located in the root directory of your Laravel project.
  //.env files are commonly used to store sensitive information like API keys, database credentials, and email settings.
  //This is considered a safer way to manage sensitive data than hardcoding it directly in your code.

  public function contactUSPost(Request $request)
  {
      $data = $request->validate([
          'name' => 'required',
          'email' => 'required|email',
          'message' => 'required',
          'subject' => 'required',
      ]);
     ContactUS::create($data);
      Mail::to($data['email'])->send(new ContactFormMail($data));

      return view('email',compact('data'));
    }
   
  

 
    


    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
   //public function create()  
    //{
   //     return view('contactUS');
   // }
    
    /**
     * Store a newly created resource in storage.
     */
   // public function store(Request $request) //storge into database
  //{
   //$data=$request->validate([
      //  'name' => 'required',
       // 'email' => 'required|email',
       // 'message' => 'required',
        //'subject'=> 'required',
        
      //]);
  //  ContactUS::create($data);
   //   return 'User data ';
    //  }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
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
//public function datatask(Request $request)
//{
 // return $request['name'].'<br>'.$request['email'] .'<br>'.$request['subject'].'<br>'.$request['message'];  
//}