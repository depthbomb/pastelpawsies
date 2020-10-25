<?php namespace App\Http\Controllers;

use Illuminate\Support\Arr;
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

	public function redirectToCommissionSubpage($subpage = null)
	{
		if ($subpage === null)
		{
			return redirect()->route('commission.info');
		}
		else
		{
			if (Arr::exists(['info', 'terms'], $subpage))
			{
				return redirect()->route('commission.'.$subpage);
			}
			else
			{
				return abort(404);
			}
		}
	}

	public function redirectToCommissionInfo()
	{
		return redirect()->route('commission.info');
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
