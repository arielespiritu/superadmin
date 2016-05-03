@extends('admin.master')

@section('title', 'SUPERadmin | Product')

@section('head')
	<!-- DataTables CSS -->
	<link href="{{URL::asset('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}" rel="stylesheet">
	<link href="{{URL::asset('assets/bower_components/datatables-responsive/css/dataTables.responsive.css')}}" rel="stylesheet">
@endsection

@section('content')
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
			<h4 class="page-header">Select Store</h4>
			<div class="col-md-12">
				<div class="container-fluid">
				@foreach($Store as $getStoreinfo)
					<div class="col-md-3">
					<a href="/product/store/{{$getStoreinfo->id}}">
						<div class="alert alert-info">
						<img src="{{URL::asset(imagePath('assets/img/logohm'))}}" class="img-thumbnail"/>
						<h5 class="text-center"><strong>{{$getStoreinfo->store_name}}</strong></h5>
						</div>
					</a>
					</div>
				@endforeach
				</div>	
			</div>
		</div>
		<br>
		<br>
		<br>
	</div>
@endsection


@section('page-script')		
<script src="{{URL::asset('assets/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>
<script>
$('.datatables').DataTable();
</script>
@endsection