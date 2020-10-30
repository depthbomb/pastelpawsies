<?php namespace App\Http\Controllers;

use App\Helpers\ThumbnailGenerator;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
	public function __construct()
	{
		$this->images = get_setting('gallery_images', 'array');
		$this->gallery_path = storage_path('app/gallery');
		$this->thumbnail_path = storage_path('app/gallery/thumbnails');
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

	public function getThumbnail(string $name)
	{
		$thumbnail_file = $this->thumbnail_path.'/'.explode('.', $name)[0].'.webp';
		if (!file_exists($thumbnail_file))
		{
			$thumbnail_file = (new ThumbnailGenerator($name))->generate();
		}

		return response()->file($thumbnail_file);
	}

	private function getImageUrls(): array
	{
		$arr = [];
		foreach ($this->images as $title => $image)
		{
			$arr[$title] = $image;
		}

		return $arr;
	}
}
