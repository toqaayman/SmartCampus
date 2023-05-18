<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Bootstrap JS -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <title>NFC</title>
		@vite(['public/css/app.css', 'public/js/app.js'])

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
		.btn {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 100%;
			border-radius: 4px;
			font-size: 18px;
			font-weight: bold;
			text-align: center;
			text-decoration: none;
		}
		.btn:hover {
			background-color: #3e8e41;
		}
		.container {
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100vh;
		}
	</style>
    </head>
    <body>
    <div class="container">
		<h1>Welcome to my website</h1>
		<a href="{{ route('nfc') }}" class="btn">Hotel</a>
		<a href="#" class="btn">Button 2</a>
		<a href="#" class="btn">Button 3</a>
	</div>

    </body>
</html>
