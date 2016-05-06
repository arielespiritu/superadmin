@extends('admin.master')

@section('title', 'SUPERadmin | Product Information')

@section('head')
	<link href="{{URL::asset('assets/dist/css/bootstrap-tagsinput.css')}}" rel="stylesheet">
@endsection

@section('content')
<style>
.strike {
    display: block;
    text-align: center;
    overflow: hidden;
    white-space: nowrap; 
}

.strike > span {
    position: relative;
    display: inline-block;
}

.strike > span:before,
.strike > span:after {
    content: "";
    position: absolute;
    top: 50%;
    width: 9999px;
    height: 2px;
    background: black;
}

.strike > span:before {
    right: 100%;
    margin-right: 15px;
}

.strike > span:after {
    left: 100%;
    margin-left: 15px;
}
</style>
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
			<div class="col-md-12">
				<div class="strike">
				   <span><b>MAIN PRODUCT INFORMATION</b></span>
				</div>				
				<br>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Product Name:</label>
							<input class="form-control" readonly value="{{$product_info->product_name}}" name="product_name">
						</div>			
					</div>
				</div>
				<?php
					$market_id="";
					$category_id="";
					$sub_category_id=$product_info->sub_category_id;
					foreach($subcategory as $getSub)
					{
						if($getSub->id  == $sub_category_id)
						{
							$category_id = $getSub->category_id;
							foreach($category as $getCat)
							{
								if($getCat->id == $category_id)
								{
									$market_id =$getCat->market_id;
									break;
								}
							}
						}
						
						if($market_id == '' && $category_id == '')
						{
							continue;
						}
						else
						{
							break;
						}
					}
				?>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Market: </label>
							<select class="form-control" readonly name="market">
										<option  value="">Choose market</option>
								@foreach($Market as $getMarket)
									@if($getMarket->id == $market_id)
										<option selected  value="{{$getMarket->id}}">{{$getMarket->market_name}}</option>
									@else
										<option  value="{{$getMarket->id}}">{{$getMarket->market_name}}</option>
									@endif
								@endforeach
							</select>
						</div>						
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Category:</label>
							<select class="form-control" readonly name="category">
									<option  value="">Choose Category</option>
								@foreach($category as $getCategory)
									@if($market_id == $getCategory->market_id)
										@if($category_id == $getCategory->id )
											<option selected value="{{$getCategory->id}}">{{$getCategory->category_name}}</option>
										@else
											<option  value="{{$getCategory->id}}">{{$getCategory->category_name}}</option>	
										@endif	
									@endif	
								@endforeach
							</select>
						</div>						
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Sub Category:</label>
							<select class="form-control" readonly name="sub_category">
									<option  value="">Choose Sub Category</option>
								@foreach($subcategory as $getSubcategory)
									@if($category_id == $getSubcategory->category_id)
										@if($sub_category_id == $getSubcategory->id)
											<option selected value="{{$getSubcategory->id}}">{{$getSubcategory->sub_category_name}}</option>
										@else
											<option value="{{$getSubcategory->id}}">{{$getSubcategory->sub_category_name}}</option>
										@endif
									@endif	
								@endforeach
							</select>
						</div>						
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Brand:</label>
							<select class="form-control " readonly name="active_price">
								<option  value="">Choose Brand</option>
								@foreach($brand as $getBrand)
									@if($getBrand->market_id == $market_id)
										<option selected value="{{$getBrand->id}}">{{$getBrand->brand_name}}</option>
									@else
										<option  value="{{$getBrand->id}}">{{$getBrand->brand_name}}</option>
									@endif
								@endforeach
							</select>
						</div>						
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Product Status:</label>
							<select class="form-control" readonly name="active_price">
								@if($product_info->product_status == '9')
									<option selected value="9">PUBLISH</option>
								@elseif($product_info->product_status == '10')
									<option selected value="10">NOT PUBLISH</option>
								@else
									<option  value="9">PUBLISH</option>
									<option  value="10">NOT PUBLISH</option>									
								@endif
							</select>
						</div>						
					</div>

				</div>				
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Embed Video Link:</label>
							<textarea class="form-control" readonly style="resize:none" placeholder="Paste here the embeded link" rows="2" name="product_embed_link">{{$product_info->product_embed_link}}</textarea>
						</div>						
					</div>					
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Product Ranged:</label>
							<textarea class="form-control" readonly style="resize:none" name="product_range" placeholder="Paste here the embeded link" rows="2">{{$product_info->product_range}}</textarea>
						</div>						
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Tags:</label><br>
							<?php 
								$tags=array();
							?>
							@if(count($Tags) > 0)
							<?php
								foreach($Tags as $getTags)
								{
									array_push($tags,$getTags->tag_description);
								}
							?>						
							@endif	
							<input data-role="tagsinput" readonly class="input input-lg" style="resize:none" value="{{implode(',',$tags)}}"  placeholder="tags" name="tags"/>
						</div>						
					</div>						
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Product description:</label>
							<textarea class="form-control" readonly style="resize:none" placeholder="Paste here the embeded link" rows="12"></textarea>
						</div>						
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-success btn-lg pull-right">Update Information</button>
					</div>
				</div>				
				<br>
				<br>
				<div class="strike">
				   <span><b>PRODUCT VARIANTS DESCRIPTION</b></span>
				</div>	
				<br>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
						<form id="myForm">
							<select readonly class="form-control" onChange="Variants(this.value,'{{$product_info->id}}')" id="variant_type" name="variant_type">
								<option  value="">Choose Variant Type</option>
								@foreach($variants as $getVariants)
									@if($getVariants->market_id == $market_id)
									<option  value="{{$getVariants->id}}">{{$getVariants->variant_name}}</option>
									@endif
								@endforeach
							</select>
						</div>
						</form>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input class="form-control" readonly placeholder="Variant Name">
						</div>						
					</div>					
					<div class="col-md-3">
						<div class="form-group">
							<button class="btn btn-primary btn-sm btn-block">Add</button>
						</div>						
					</div>	
					<div class="col-md-12  table-striped">
					<hr>
						<table class="table" id="variant_table">
							<thead>
								<tr>
									<th>DESCRIPTION TYPE</th>
									<th>DESCRIPTION VALUE</th>
									<th width="2%"></th>
								</tr>
							</thead>	
							<tbody>	
							
							</tbody>	
						</table>
						<hr>
						<br>
						<br>
						<br>
						<br>
						<br>
					</div>
				</div>					
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
					<input id="product_variant_combination" style="display:none"  value="{{$childproduct[0]->getCombo}}"/>
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
<script src="{{URL::asset('assets/dist/js/bootstrap-tagsinput.js')}}"></script>
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
function Variants(vKey,pKey)
{
	var formData = new FormData();
	formData.append('vKey',vKey);
	formData.append('pKey',pKey);
	var selected = $("#variant_type option[value='"+vKey+"']").text();
	var toJSON ="";
	$.ajax({
		type: "POST",
		url: '/product/ret-variant',  
		data:formData,
		contentType: false,
		cache:false,
		processData:false,  
		success: function(result)
		{
			toJSON =JSON.parse(result);
			if(toJSON[0].success == '1')
			{
				$('#variant_table tbody').empty();
				for(i= 0; i < toJSON[0].data.length; i++)
				{
					$('#variant_table tbody').append
					(''+
					'<tr id="row-"'+vKey+'>'+
						'<td>'+selected+'</td>'+
						'<td>'+toJSON[0].data[i].variant_name_value+'</td>'+
						'<td><button class="btn btn-danger btn-xs">REMOVE</button</td>'+
					'</tr>'
					+'');					
				}
			}
		},
	   error: function(errResult) {
			alert(errResult);
	   }
	});	
}
</script>
@endsection