<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta name="_token" content="{!! csrf_token() !!}"/>
	<meta name="keywords" content="">
    <title>admin</title>


    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ URL::asset('assets/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ URL::asset('assets/dist/css/timeline.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::asset('assets/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ URL::asset('assets/bower_components/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>		
        <!-- Page Content -->
        <div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>
					@if (count($errors) > 0)
						<div class="alert alert-danger" style="padding:10px;">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif
						@if (Session::has('message'))
						<div class="alert alert-success " style="padding:10px;">
							<ul>
									<li>{{ Session::get('message') }}</li>
							</ul>
						</div>
					@endif
					<div class="panel panel-default">
					
						<div class="panel-body">
						<center>
							</br>
							<img src="{{ URL::asset('assets/img/logo.png')}}" class="img-responsive"   />
							</br>
							</br>
						</center>
							<form role="form" method="POST" action="/auth/login" onsubmit="submit_btn.disabled = true; return true;"">
								<fieldset>
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
										<input class="form-control" placeholder="Email" name="email" type="email" autofocus>
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Password" name="password" type="password" value="">
									</div>
									</br>
									<!-- Change this to a button or input when using this as a form -->
									<button type="submit" class="btn btn-lg btn-primary btn-block" id="submit_btn">Login</a>
								</fieldset>
							</form>
						</div>
					</div>
					</br>
					</br>
					</br>
					</br>
					</br>
					</br>
					</br>
				</div>
			</div>
		</div>
	 <!-- jQuery -->
    <script src="{{ URL::asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ URL::asset('assets/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ URL::asset('assets/bower_components/raphael/raphael-min.js') }}"></script>
    <script src="{{ URL::asset('assets/bower_components/morrisjs/morris.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/morris-data.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ URL::asset('assets/dist/js/sb-admin-2.js') }}"></script>
	<script>
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});	
		function addCommas(str) {
		  return (str + "").replace(/\b(\d+)((\.\d+)*)\b/g, function(a, b, c) {
			return (b.charAt(0) > 0 && !(c || ".").lastIndexOf(".") ? b.replace(/(\d)(?=(\d{3})+$)/g, "$1,") : b) + c;
		  });
		}
		
	</script>
	</body>

</html>
