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
								@if(isset($store_name))
									@if($store_name ==$getStoreinfo->store_name )
										<option selected value="{{$getStoreinfo->id}}">{{$getStoreinfo->store_name}}</option>
									@else
										<option value="{{$getStoreinfo->id}}">{{$getStoreinfo->store_name}}</option>
									@endif
								@else
									<option value="{{$getStoreinfo->id}}">{{$getStoreinfo->store_name}}</option>
								@endif
							@endforeach							
						</select>
					</div>
				</div>
			</div>			
				<table width="100%" class="table table-striped table-bordered table-hover datatables" >
					<thead>
						<tr>
							<th>Id</th>
							<th>Product name</th>
							<th>Product Issues</th>
							<th>Status</th>
							<th>Date Created</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					@if(count($Product)<=0)
					@else
					@foreach($Product as $getProductInfo)
						<tr class="odd gradeX">
							<td width="2%" >{{$getProductInfo->id}}</td>
							<td>{{$getProductInfo->product_name}}</td>
							<td>
								<?php
								$errors = array();
								$checkifHasCategory="false";
								$checkifVariantUse = checkIfVariantDescriptionNoteUse($getProductInfo->getChildProduct,$getProductInfo->getVariantsInfo);

								foreach($subcategory as $getcategory)
								{
									if($getcategory->id == $getProductInfo->sub_category_id )
									{
										$checkifHasCategory="true";
										break;
									}
								}
								if($checkifHasCategory == 'false')
								{
									array_push($errors,'Category Not Define');
								}
								if($getProductInfo->sub_category_id == '')
								{
									array_push($errors,'Sub Category Not Define');
								}
								if($checkifVariantUse != 'false')
								{
									array_push($errors,$checkifVariantUse);
								}
								?>
								@if(count($errors) <= '0')
									<b>No Problem</b>
								@else
									<b>Problem/s:</b> {{implode (", ", $errors)}}
								@endif
								<br>
								<b>Type:</b> {{getProductType($getProductInfo->getChildProduct)}}
								<br>
								<b>Last Update:</b> {{smartdate(strtotime($getProductInfo->updated_at))}}
							</td>
							<td>
								@if($getProductInfo->product_status == '9')
									ACTIVE
								@else
									INACTIVE
								@endif
							</td>
							<td>{{smartdate(strtotime($getProductInfo->created_at))}}</td>
							<td>
								<a href="/product/{{$getProductInfo->id}}" class="btn btn-info btn-xs">Edit</a>
								<a href="/product/variants/{{$getProductInfo->id}}" class="btn btn-success btn-xs">Variants</a>
							</td>
						</tr>
					@endforeach
					@endif
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
	window.location = "{{URL::asset('')}}product/store/"+value;
}
</script>
@endsection