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
			<h4 class="page-header">Store</h4>
			<div class="dataTable_wrapper">
			<div class="row ">
				<div class="col-md-6 ">
					<div class="form-group">
						<select class="form-control" onChange="redirectUrl(this.value)">
						<option value="">Choose Store</option>
							@foreach($Store as $getStoreinfo)
								@if($store_name ==$getStoreinfo->store_name )
									<option selected value="{{$getStoreinfo->id}}">{{$getStoreinfo->store_name}}</option>
								@else
									<option value="{{$getStoreinfo->id}}">{{$getStoreinfo->store_name}}</option>
								@endif
							@endforeach							
						</select>
					</div>
				</div>
			</div>			
			<div class="alert alert-info text-center">
				<h4 class="no-padding">
				<strong class="no-padding">
					{{$store_name}} Store
				</strong class="no-padding">
				</h4>
			</div>			
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
							<td>
								@if($getProductInfo->product_status == '9')
									ACTIVE
								@else
									INACTIVE
								@endif
							</td>
							<td>
								<a href="/product/{{$getProductInfo->id}}" class="btn btn-info btn-xs">Edit</a>
								<a href="/product/variants/{{$getProductInfo->id}}" class="btn btn-success btn-xs">Variants</a>
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
function redirectUrl(value)
{
	window.location = "{{URL::asset('')}}/product/store/"+value;
}
</script>
@endsection