<?php

	use Illuminate\Support\HtmlString;
	use \Illuminate\Support\Facades\Route;

	/**
	 * Our "bridge" that passes server variables to the frontend
	 *
	 * @return string
	 */
	function bridge(): string
	{
		return json_encode([
			'production' => app()->environment() === 'production'
		]);
	}

	/**
	 * Retrieves a setting value by its variable name
	 *
	 * @param string $key Name of variable to retrieve the value of
	 * @param string|null $asserted_type Expected type of the setting value, throws an exception if not this type
	 * @return mixed
	 */
	function get_setting(string $key, ?string $asserted_type = null)
	{
		$settings_file = storage_path('app/settings.php');
		include($settings_file);

		$vars = get_defined_vars();

		if(array_key_exists($key, $vars))
		{
			$setting = $vars[$key];
			$var_type = gettype($setting);
			if ($asserted_type)
			{
				if ($var_type !== $asserted_type)
				{
					throw new \Exception('Unexpected setting type. Expected '.$asserted_type.' but instead got '.$var_type.'. Please check the settings file!');
				}
			}

			return $setting;
		}
		else
		{
			throw new \Exception('Missing or invalid setting key: '.$key);
		}
	}

	/**
	 * Formats text for page <title>s
	 *
	 * @param string|null $page_title
	 * @return HtmlString
	 */
	function page_title(?string $page_title): HtmlString
	{
		$site_name = 'pastelpawsies';
		$separator = '&raquo;';
		if ($page_title)
		{
			$page_title = "$page_title $separator $site_name";
		}
		else
		{
			$page_title = $site_name;
		}

		return new HtmlString($page_title);
	}
	

	/**
	 * Appends an mtime-based cache buster to file paths
	 *
	 * @param string $file_path
	 * @return string
	 */
	function bust(string $file_path): string
	{
		$file_full_path = public_path($file_path);
		if (file_exists($file_full_path))
		{
			$mtime = filemtime($file_full_path);
			return url($file_path).'?v='.$mtime;
		}
		else
		{
			return url($file_path);
		}
	}


	/**
	 * Lazy helper to return a 1x1 transparent pixel
	 *
	 * @return string
	 */
	function px(): string
	{
		return 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
	}


	function simplified_fnmatch(string $pattern, string $string): bool
	{
		$escaped_pattern = '';
		for ($i = 0; $i < strlen($pattern); $i++)
		{
			if (($pattern[$i] == '?') || ($pattern[$i] == '[') || ($pattern[$i] == ']') || ($pattern[$i] == '{') || ($pattern[$i] == '}')) $escaped_pattern .= '\\';
			$escaped_pattern .= $pattern[$i];
		}

		return fnmatch($escaped_pattern, $string, FNM_CASEFOLD);
	}


	/**
	 * Returns a CSS class name if the current route matches $route
	 *
	 * @param string $route
	 * @param string $class
	 * @return string
	 */
	function active_class(string $route, string $class = 'active'): string
	{
		$current_route = Route::currentRouteName();
		return simplified_fnmatch($route, $current_route) ? $class : '';
	}


	function uses_dark_theme(): bool
	{
		$cookie = $_COOKIE['dark_theme'] ?? null;
		return ($cookie AND $cookie === 'yes');
	}


	/**
	 * Returns arbitrary CSS classes based on the user's theme preference cookie
	 *
	 * @param string|null $dark_theme_class
	 * @param string|null $light_theme_class
	 * @return string|null
	 */
	function theme_class(?string $dark_theme_class = null, ?string $light_theme_class = null): ?string
	{
		if (!$dark_theme_class AND !$light_theme_class)
		{
			throw new \Exception('Both theme classes may not be null');
		}

		if (uses_dark_theme())
		{
			return $dark_theme_class;
		}
		else
		{
			return $light_theme_class;
		}
	}