<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>{{ $code }}</title>
		<style type="text/css">
			html, body {
				margin: 3rem auto;
				padding: 0;
				max-width: 500px;
				color: black;
				text-align: center;
				font-family: monospace;
				background-color: white;
			}

			img {
				margin: 1rem auto;
				max-width: 100%;
				height: auto;
			}
		</style>
	</head>
	<body>
		<h1>&lt;{{ $message }}&gt;</h1>
		<img src="{{ bust('/assets/img/errors/'.$code.'.png') }}" alt="{{ $code }} - {{ $message }}" title="{{ $code }} - {{ $message }}" width="500" height="500">
		<a href="/">Return to home</a>
	</body>
</html>