<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Contact2Controller extends Controller
{
    public function showinfo()
    {
        return view('contact2');
    }

    public function viewfromfolder()
    {
        return view('kansio/contact2');
    }

    public function viewfromfolder2()
    {
        return view('kansio.contact3');
    }


    public function returninfo()
    {
        return 'Controllerin return-lause';
    }

}
