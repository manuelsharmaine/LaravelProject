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
}
