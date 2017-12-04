<!DOCTYPE html>
<html>
<head>
	<title>Customer Update</title>
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
	<form action="/customers-update" method="POST">
		{{ csrf_field() }}
		<br><br><br>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Name :</label>
						<input type="hidden" name="id" value="{{ $customer['id'] }}">
						<input type="text" name="name" placeholder="Enter customer name" class="form-control" value="{{ $customer['name']}}">
					</div>
					<div class="form-group">
						<label>phone_number :</label>
						<input type="text" name="phone_number" placeholder="Enter customer name" class="form-control" value="{{ $customer['phone_number']}}">
					</div>
					<div class="form-group">
						<label>email :</label>
						<input type="text" name="email" placeholder="Enter customer name" class="form-control" value="{{ $customer['email']}}">
					</div>
					<input type="submit" name="submit" class="btn btn-success" value="Update">
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</form>
</body>
</html>

<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<script>
	$('#errorAlert').hide(4000).slideUp(400);
</script>
