<!DOCTYPE html>
<html>
<head>
	<title>Customer Register</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
	@foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <div id="errorAlert" >
              <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
              </div>    
          </div>
        </div>
        @endif
    @endforeach
	<form action="customers" method="POST">
		     {{ csrf_field() }}
		<br><br><br>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Name :</label>
						<input type="text" name="name" placeholder="Enter customer name" class="form-control">
					</div>
					<div class="form-group">
						<label>phone_number :</label>
						<input type="text" name="phone_number" placeholder="Enter customer name" class="form-control">
					</div>
					<div class="form-group">
						<label>email :</label>
						<input type="text" name="email" placeholder="Enter customer name" class="form-control">
					</div>
					<input type="submit" name="submit" class="btn btn-success">
				</div>
				<div class="col-md-4">
					@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</form>
	<div class="container">
		<table class="table table-responsive">
			<thead>
				<tr>
					<th>Name</th>
					<th>Mobile number</th>
					<th>Email</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@if(count($customers))
				
				@foreach($customers as $customer)
					<tr>
						<td>{{ $customer['name'] }}</td>
						<td>{{ $customer['phone_number'] }}</td>
						<td>{{ $customer['email'] }}</td>
						<td>
							<a href="/customers/{{ $customer['id'] }}" class="btn btn-warning">update</a>
							<a href="/customers-delete/{{ $customer['id'] }}" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				@endforeach
				@else
					<tr>
						<td colspan="4" class="text-center">No records found</td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>

</body>
</html>
<!-- jQuery 3 -->
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<script>
	$('#errorAlert').hide(4000).slideUp(400);
</script>
