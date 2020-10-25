<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
	public function landing()
	{
		return view('deploy/landing');
	}

	public function about()
	{
		return view('deploy/about');
	}

	public function gallery()
	{
		(array) $images = get_setting('gallery_images', 'array');

		return $images;
	}

	public function commissionInfo()
	{
		return view('deploy/commission/info');
	}

	public function commissionTerms()
	{
		return view('deploy/commission/terms');
	}
}
