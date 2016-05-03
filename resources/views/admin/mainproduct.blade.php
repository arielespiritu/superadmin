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
			<h4 class="page-header">{{$store_name}} Store</h4>
			<div class="dataTable_wrapper">
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
					@foreach($Product as $getProductInfo)
						<tr class="odd gradeX">
							<td width="2%">{{$getProductInfo->id}}</td>
							<td width="10%"></td>
							<td>{{$getProductInfo->product_name}}</td>
							<td>
								@foreach($subcategory as $getcategory)
									@if($getcategory->id == $getProductInfo->sub_category_id )
										{{$getcategory->sub_category_name}}
										<?php
											break;
										?>
									@endif
								@endforeach
							</td>
							<td>{{$getProductInfo->product_status}}</td>
							<td>
								<a href="javascript:;" class="btn btn-info btn-xs">Edit</a>
								<a href="javascript:;" class="btn btn-success btn-xs">Variants</a>
							</td>
						</tr>
					@endforeach	
					</tbody>
				</table>
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