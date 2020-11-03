<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
	public function trelloBoard()
	{
		return redirect()->away('https://trello.com/b/qutx57bA/pastelpawsies-commissions-queue');
	}

	public function commissionForm()
	{
		return redirect()->away('https://docs.google.com/forms/d/e/1FAIpQLSer8Tjsw2IO-kxs1cS8l8oQFY807j90ombSNDbJTl-MvMVQmg/viewform');
	}
}
