<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Debugger</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<section class="container">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Product</th>
					<th>Price</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
				@foreach($products as $data)
				<tr>
					<td>{{ $data->name }}</td>
					<td>{{ $data->price }}</td>
					<td>{{ $data->description }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</section>
</body>
</html>