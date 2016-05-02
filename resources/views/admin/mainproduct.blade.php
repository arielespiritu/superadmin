@extends('admin.master')

@section('title', 'SUPERadmin|Product')

@section('head')
	<!-- DataTables CSS -->
	<link href="{{URL::asset('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}" rel="stylesheet">
	<link href="{{URL::asset('assets/bower_components/datatables-responsive/css/dataTables.responsive.css')}}" rel="stylesheet">
@endsection

@section('content')
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
			<h4 class="page-header">Stores</h4>
			<div class="dataTable_wrapper">
							<table width="100%" class="table table-striped table-bordered table-hover datatables" >
								<thead>
									<tr>
										<th>Id</th>
										<th></th>
										<th>Product name</th>
									</tr>
								</thead>
								<tbody>
								@foreach($Product as $getProductInfo)
									<tr class="odd gradeX">
										<td>{{$getProductInfo->id}}</td>
										<td></td>
										<td>{{$getProductInfo->product_name}}</td>
									</tr>
								@endforeach	
								</tbody>
							</table>
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