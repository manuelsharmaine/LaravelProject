<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //

    public function index(){
        return view('index');
    }

    public function about(){
        $name = 'James Smith';
        $email =  'jame@smith.com';
        $cars =  array("Volvo", "BMW", "Toyota");
        $data = '<table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>';
        // return view('pages.about', ['name' => 'John Doe']);
        // return view('pages.about')->with('name', 'JaneDoe')->with('email','jane@doe.com');
        return view('pages.about', compact('name','email','cars','data'));
    }

    public function checkRequest(Request $request){
      echo 'Path '.$request->path() .'<br>';
      echo 'URL '.$request->url().'<br>';
      echo 'Method  '.$request->method().'<br>';
      echo 'IP  '.$request->ip().'<br>';
    }
    public function contactUs(){
      return view('pages.contact-us');
    }

    public function submitContact(Request $request){
      // $request->has('photo') 


        $request->validate([
          'message' => 'required',
          'fullname' => 'required',
          'email' => 'required'
        ]);


      if($request->message != ''){
        $all = $request->all(); //most used   to all fields
        $collect = $request->collect();
        $input = $request->input();
        $fullname = $request->input('fullname'); //speficic field
        $email = $request->email; //most used to get specific fields
        $only = $request->only(['fullname','email']);
        $except = $request->except('_token');
        // return $except;
        return redirect()->back()->with('status','Save Succesfully');

      }else{
        // return redirect()->back();
        return redirect('contact-us')->with('status','Incomplete Data')->withInput();
      }

    
    }
}
