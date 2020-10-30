<?php namespace App\Helpers;

use Image;

class ThumbnailGenerator
{
	private string $image_name;
	private string $image_path;
	private string $gallery_path;
	private string $thumbnail_path;

	public function __construct(string $image_name)
	{
		$this->image_name = $image_name;
		$this->gallery_path = storage_path('app/gallery');
		$this->thumbnail_path = storage_path('app/gallery/thumbnails');
		$this->image_path = $this->gallery_path.'/'.$this->image_name;
	}

	public function generate(): ?string
	{
		if (!file_exists($this->thumbnail_path))
		{
			mkdir($this->thumbnail_path);
		}

		if ($this->imageExists())
		{
			return $this->generateThumbnail();
		}
		else
		{
			return null;
		}
	}

	private function imageExists(): bool
	{
		return file_exists($this->image_path);
	}

	private function generateThumbnail(): string
	{
		$image_basename = explode('.', $this->image_name)[0];
		$thumbnail_name = $image_basename.'.webp';
		$thumbnail_destination = $this->thumbnail_path.'/'.$thumbnail_name;

		$image = Image::make($this->image_path);
		$image->fit(300, 300, function($c) {
			$c->upsize();
		});
		$image->encode('webp');
		$image->save($thumbnail_destination, 50, 'webp');

		return $thumbnail_destination;
	}
}