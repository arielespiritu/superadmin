@extends('admin.master')

@section('title', 'SUPERadmin | Product Information')

@section('head')
@endsection

@section('content')
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
			@if($mode =='edit')
			<h4 class="page-header">Edit Product {{$product_info->product_name}} </h4>
			<div class="alert alert-info text-center">
				<h4 class="no-padding">
				<strong class="no-padding">
					{{$store_name}} Store
				</strong class="no-padding">
				</h4>
			</div>
			@elseif($mode =='variants')
			<h4 class="page-header">{{$product_info->product_name}} <b class="small">Variants</b></h4>
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
							<td>&#8369; {{number_format($getChild->sale_price,2)}}</td>
							<td>&#8369; {{number_format($getChild->retail_price,2)}}</td>
							<td>&#8369; {{number_format($getChild->product_cost,2)}}</td>
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
								<a href="/product/variants/{{$product_info->id}}/{{$getChild->id}}" class="btn btn-info btn-xs">Edit Variants</a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>	
			@elseif($mode =='edit-variants')
				<h4 class="page-header">{{$product_info->product_name}} <b class="small">Variants</b></h4>
				<div class="alert alert-info text-center">
					<h4 class="no-padding">
					<strong class="no-padding">
						{{$store_name}} Store
					</strong class="no-padding">
					</h4>
				</div>
				<div class="col-md-12">
					<div class="row ">
						<div class="col-md-3">
							<div class="form-group">
								<label>Sale Price:</label>
								<input class="form-control" value="{{$childproduct[0]->sale_price}}" name="sale_price">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Retail Price:</label>
								<input class="form-control" value="{{$childproduct[0]->retail_price}}" name="retail_price">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Product Cost:</label>
								<input class="form-control" value="{{$childproduct[0]->product_cost}}" name="product_cost">
							</div>
						</div>	
						<div class="col-md-3">
							<div class="form-group">
								<label>Active Price:</label>
								<select class="form-control" name="active_price">
									<?php
										$retailbool='';
										$salebool='';
										if($childproduct[0]->active_price == '8')
										{
											$retailbool='selected';
										}
										elseif($childproduct[0]->active_price == '9')
										{
											$salebool='selected';
										}
									?>
									<option {{$retailbool}} value="8">RETAIL PRICE</option>
									<option {{$salebool}} value="9">SALE PRICE</option>
								</select>
							</div>						
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Weight (kg):</label>
								<input class="form-control" value="{{$childproduct[0]->weight}}" name="weight">
							</div>
						</div>	
						<div class="col-md-3">
							<div class="form-group">
								<label>Height (CM):</label>
								<input class="form-control" value="{{$childproduct[0]->height}}" name="height">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Length (CM):</label>
								<input class="form-control" value="{{$childproduct[0]->length}}" name="length">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Width (CM):</label>
								<input class="form-control" value="{{$childproduct[0]->width}}" name="width">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Status:</label>
								<select class="form-control" name="active_price">
									<?php
										$publishBool='';
										$notPublishbool='';
										if($childproduct[0]->product_status == '9')
										{
											$publishBool='selected';
										}
										elseif($childproduct[0]->product_status == '10')
										{
											$notPublishbool='selected';
										}
									?>
									<option {{$publishBool}} value="9">PUBLISH</option>
									<option {{$notPublishbool}} value="10">NOT PUBLISH</option>
								</select>
							</div>
						</div>						
					</div>
				</div>
				<div class="col-md-12">
					<div class="row">
						<?php $variants = array();$i=0; ?>
						@foreach($variant as $productVar)
						@if(!in_array($productVar->variant_id,$variants))
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" >{{$productVar->getVariant->variant_name}}:</label>
									<select  id="variant_key-{{$productVar->variant_id}}" data-placeholder="Choose {{$productVar->getVariant->variant_name}}"  class="form-control" >
								@foreach($variant as $product_value)
									@if($productVar->variant_id ==$product_value->variant_id)
										<option  value="{{$product_value->id}}" />{{$product_value->variant_name_value}}
									@endif	
								@endforeach
									</select>
								</div>
							</div>	
							<?php array_push($variants,$productVar->variant_id);  ?>
						@else
						@endif
						<?php $i++; ?>
						@endforeach	
						<?php $variants= json_encode($variants); ?>						
					</div>
					<hr>
				</div>
				<div class="col-md-12">
					<input id="select_values" style="display:none"  value=<?php echo $variants; ?>  />
					<input id="product_variant_combination" style="display:none"  value="{{$childproduct[0]->getCombo}}"  />				
					<button class="btn btn-primary btn-lg pull-right">Update Variants</button>
				</div>
			</div>
			@endif
		</div>	
		<br>
		<br>
		<br>
	</div>
@endsection

@section('page-script')	
<script>
var getCount =document.getElementById('select_values').value;
var getCombo =document.getElementById('product_variant_combination').value;
dynamicChosen(getCount,'variant_key-',getCombo);
function dynamicChosen(arrayKeys,nameKey,jsonSelected)
{
	var toJson = JSON.parse(arrayKeys);
	var toJson1 = JSON.parse(jsonSelected);
	for(i=0;i< toJson.length;i++)
	{
		for(getSelected=0;getSelected <toJson1.length;getSelected++)
		{
			if(toJson[i] == toJson1[getSelected].get_product_variant.variant_id )
			{
				$("#"+nameKey+toJson[i]).val(toJson1[getSelected].product_variant_id);
			}
		}
	}
}
</script>
@endsection