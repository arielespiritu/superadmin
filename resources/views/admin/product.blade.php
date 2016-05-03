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
			<h4 class="page-header">Product</h4>
				<div class="row ">
					<div class="col-md-6 ">
						<div class="form-group">
							<select class="form-control" onChange="redirectUrl(this.value)">
							<option value="">Choose Store</option>
								@foreach($Store as $getStoreinfo)
										<option value="{{$getStoreinfo->id}}">{{$getStoreinfo->store_name}}</option>
								@endforeach							
							</select>
						</div>
					</div>
				</div>
				<hr class="no-padding">
				<br>
				<table width="100%" class="table table-striped table-bordered table-hover datatables" >
					<thead>
						<tr>
							<th>Id</th>
							<th></th>
							<th>Product name</th>
							<th>Sub category</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>				
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
function redirectUrl(value)
{
	window.location = "{{URL::asset('')}}/product/store/"+value;
}
</script>
@endsection