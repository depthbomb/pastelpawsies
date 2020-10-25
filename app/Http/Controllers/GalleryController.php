<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
	public function __construct()
	{
		$this->images = get_setting('gallery_images', 'array');
		$this->gallery_path = storage_path('app/gallery');
	}

	public function index()
	{
		$images = collect($this->getImageUrls());
		return view('deploy/gallery', compact('images'));
	}

	public function getImage(string $name)
	{
		$image_path = $this->gallery_path.'/'.$name;
		if (file_exists($image_path))
		{
			return response()->file($image_path);
		}
		else
		{
			return abort(404);
		}
	}

	private function getImageUrls(): array
	{
		$arr = [];
		foreach ($this->images as $title => $image)
		{
			$arr[$title] = route('gallery.image', $image);
		}

		return $arr;
	}
}
