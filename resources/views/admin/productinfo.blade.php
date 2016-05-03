@extends('admin.master')

@section('title', 'SUPERadmin | Product Information')

@section('head')
@endsection

@section('content')
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
			@if($mode =='edit')
			<h4 class="page-header">Edit Product {{$product_name}} </h4>
			<div class="alert alert-info text-center">
				<h4 class="no-padding">
				<strong class="no-padding">
					 Store
				</strong class="no-padding">
				</h4>
			</div>
			@elseif($mode =='variants')
			<h4 class="page-header">{{$product_name}} <b class="small">Variants</b></h4>
			<div class="alert alert-info text-center">
				<h4 class="no-padding">
				<strong class="no-padding">
					{{$store_name}} Store
				</strong class="no-padding">
				</h4>
			</div>
			<hr class="no-padding">
			<br>			
				<table width="100%" class="table table-striped table-bordered table-hover datatables" >
					<thead>
						<tr>
							<th>Id</th>
							<th>Product Features</th>
							<th>Sale Price</th>
							<th>Retail Price</th>
							<th>Product Cost</th>
							<th>Active Price</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					@foreach($childproduct as $getChild)
						<tr>
							<td>{{$getChild->id}}</td>
							<td>
								@foreach(getProductCombo($getChild->id) as $product_combo)
								{{getProductvariantsDescription($product_combo->product_variant_id)}} <br>
								@endforeach	</b>								
							</td>
							<td>{{$getChild->sale_price}}</td>
							<td>{{$getChild->retail_price}}</td>
							<td>{{$getChild->product_cost}}</td>
							<td>
								@if($getChild->active_price == '7')
									SALE PRICE
								@elseif($getChild->active_price == '8')
									RETAIL PRICE

								@endif									
							</td>
							<td>
								@if($getChild->product_status == '9')
									ACTIVE
								@else
									INACTIVE
								@endif							
							</td>
							<td>
								<a href="javascript:;" class="btn btn-info btn-xs">Edit Variants</a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>			
			@endif
		</div>
		<br>
		<br>
		<br>
	</div>
@endsection


@section('page-script')	
@endsection