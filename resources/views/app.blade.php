<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}"/>

	

	
	<title>Talesale Comp</title>
        @vite(['resources/css/app.css','resources/sass/app.scss','resources/js/app.js' ])
</head>
<body>
	@if (Auth::check())
	<script>
          window.Laravel = {!!json_encode([
             'isLoggedin' => true,
			 'user' => Auth::user()
		  ])!!}
	</script>
    @else 
	   <script>
            window.Laravel = {!!json_encode([
				'isLoggedin' => false
			])!!}
	   </script>
     @endif
	<div id="app"> 		
	
    </div>

</body>
</html>
<script>

</script>