<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function homepage() {
        $ourName = 'Brad';

        $animals = ['Meowsalot', 'Barkalot','Purraloud'];

        return view('homepage', ['name' => $ourName,'allAnimals'=>$animals]);
    }   

    public function about() {
        return view('single-post');
    }
}
