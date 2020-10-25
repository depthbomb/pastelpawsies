<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>{{ $code }}</title>
	</head>
	<body style="margin:5rem 0;color:black;font-family:monospace;background-color:white;">
		<div style="margin:0 auto;text-align:center;">
			<h1>&lt;{{ $message }}&gt;</h1>
			<img src="{{ bust('/assets/img/errors/'.$code.'.png') }}" alt="{{ $code }} - {{ $message }}" title="{{ $code }} - {{ $message }}" width="500" height="500">
			<a href="/" style="display:block;">Return to home</a>
		</div>
	</body>
</html>