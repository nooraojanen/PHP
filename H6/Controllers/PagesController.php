<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
	$name = "<span style='background-color:#ffc;'>Raaka-Arska</span>";
        // return 'About Page';
        return view('pages.about')->with('name', $name);
    }

    public function about2()
    {

	$people = [];
	$people[] = 'Raaka';
	$people[] = 'Arska';

	$data = [];
	$data['first'] = 'Raaka';
	$data['last'] = 'Arska';

	return view('pages.about2')->with('people', $people);

	/* TAI NÄIN:
        return view('pages.about2')->with([
		'first' => 'Raaka',
		'last'  => 'Arska'
	]);
	*/
    }
}