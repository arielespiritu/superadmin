@extends('admin.master')

@section('title', 'Admin Panel')

@section('head')
<link href="{{ URL::asset('assets/css/editor.css') }}" type="text/css" rel="stylesheet"/>
@endsection

@section('content')
		
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
				<h4 class="page-header">Store Profile</h4>
				<form class="" role="form" name="profile_form" enctype="multipart/form-data" method="POST" action="/setting/add-news" onSubmit="document.profile_form.description.value = $('#txtEditor').Editor('getText'); btn_add.disabled = true; return true;">
					<div class="col-md-12">
						<h4>Store Info</h4>
						</br>
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-2">
									<p>Logo</p>
								</div>	
								<div class="col-md-5">
									<img id="logo-main" src="{{getStoreLogo('http://homemallph.com//assets/img/store/'.$store_info[0]->store_name.'/logo/'.$store_info[0]->id)}}" style="border:1px solid #d3d3d3; height:120px;">
									</br>
									</br>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="col-md-2">
									<p>Store Name</p>
								</div>	
								<div class="col-md-5">
									<div class="col-md-5" style="padding:0px;">
										<input class="form-control input-sm " name="store_name" id="store_name" type="text" placeholder="Store Name" value="{{$store_info[0]->store_name}}" required readonly> 
										</br>
									</div>
									<div class="col-md-5">
										<p>.homemallph.com</p>
									</div>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="col-md-2">
									<p>Display Name</p>
								</div>	
								<div class="col-md-5">
									<input class="form-control input-sm" name="display_name" id="display_name" type="text" placeholder="Store Name" value="{{$store_info[0]->display_name}}" required readonly>
									</br>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="col-md-2">
									<p>FB Link Page</p>
								</div>	
								<div class="col-md-5">
									<input class="form-control input-sm" name="store_fb_link" id="store_fb_link" type="text" placeholder="Store FB Link" value="{{$store_info[0]->store_fb_link}}" required readonly>
									</br>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="col-md-2">
									<p>Store Description</p>
								</div>	
								<div class="col-md-5">
									<textarea rows="4" class="form-control input-sm  " placeholder="Store Description" name="store_decription" required readonly>{{$store_info[0]->store_description}}</textarea>
									</br>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="col-md-2">
									<p>Store State</p>
								</div>	
								<div class="col-md-5">
									<select class="form-control input-sm " id="city" name="city" value="{{$store_info[0]->store_city}}" required readonly>
										<option value="0">Select State</option>
										@foreach($city as $city_list)
											@if($city_list->id==$store_info[0]->store_city)
												<option selected value="{{$city_list->id}}">{{$city_list->city_name}}</option>
											@else
												<option value="{{$city_list->id}}">{{$city_list->city_name}}</option>
											@endif
										@endforeach
									</select>
									</br>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="col-md-2">
									<p>Store City</p>
								</div>	
								<div class="col-md-5">
								<input  id="sArea" type="hidden"  value="{{$store_info[0]->store_area}}" >
									<select class="form-control input-sm " id="area" name="area" value="" required readonly>
										<option></option>
									</select>
									</br>
								</div>	
							</div>
						</div>
						<h4>Merchant Info</h4>
						</br>
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-2">
									<p>Merchant Name</p>
								</div>	
								<div class="col-md-5">
									<input class="form-control input-sm" name="merchant_name" id="merchant_name" type="text" placeholder="Merchant Name" value="{{$store_info[0]->store_owner->owner_name}}" required readonly>
									</br>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="col-md-2">
									<p>Merchant Nick Name</p>
								</div>	
								<div class="col-md-5">
									<input class="form-control input-sm" name="merchant_nick_name" id="merchant_nick_name" type="text" placeholder="Nick Name" value="{{$store_info[0]->store_owner->owner_nick_name}}" required readonly>
									</br>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="col-md-2">
									<p>Email</p>
								</div>	
								<div class="col-md-5">
									<input class="form-control input-sm" name="email" id="email" type="text" placeholder="Email" value="{{$store_info[0]->store_owner->owner_email}}" required readonly>
									</br>
								</div>	
							</div>

							<div class="col-md-12">
								<div class="col-md-2">
									<p>Mobile No</p>
								</div>	
								<div class="col-md-5">
									<input class="form-control input-sm" name="mobile_no" id="mobile_no" type="text" placeholder="Mobile Number" value="{{$store_info[0]->store_owner->owner_mobile}}" required readonly>
									</br>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="col-md-2">
									<p>Store Address</p>
								</div>	
								<div class="col-md-5">
									<textarea rows="4" class="form-control input-sm  " placeholder="Store Address" name="store_address" required readonly>{{$store_info[0]->store_complete_address}}</textarea>
									</br>
								</div>	
							</div>
						</div>
						<h4>Other Info</h4>
						</br>
						<div class="row">
							<div class="col-md-12">
									<center><p>About Store</p></center>
									<textarea id="txtEditor" name="description">{{$store_info[0]->store_about}}</textarea> 
									</br>
							</div>
						</div>
						
						<h4>Terms and Conditions</h4>
						</br>
						<div class="row">
							<div class="col-md-12">
									<center><p>About Store</p></center>
									<textarea id="txtEditor2" name="description2">{{$store_info[0]->store_about}}</textarea> 
									</br>
							</div>
						</div>
						
						<h4>Privacy and Policies</h4>
						</br>
						<div class="row">
							<div class="col-md-12">
									<center><p>About Store</p></center>
									<textarea id="txtEditor3" name="description3">{{$store_info[0]->store_about}}</textarea> 
									</br>
							</div>
						</div>
						
						<h4>FAQS</h4>
						</br>
						<div class="row">
							<div class="col-md-12">
									<center><p>About Store</p></center>
									<textarea id="txtEditor4" name="description4">{{$store_info[0]->store_about}}</textarea> 
									</br>
							</div>
						</div>
				
					</div>	
                </form>					
                </div>
            </div>
			<br>
			<br>
			<br>
        </div>

@endsection


@section('page-script')	

	<script src="{{ URL::asset('assets/js/editor.js') }}"></script>

	<script>
	// function clicks(){
	// var a = $("#txtEditor").Editor('getText');
	// alert(a);
	// }
	$('#city').on('change', function() {
		//alert( this.value ); // or $(this).val()
		var cid = this.value;
		var area = $('#sArea').val();
		getArea(cid,area);
	});
	
	function getArea(cid,area){
		$.ajax({
				type: "GET",
				url: "/location/get-city-area?cid="+cid,
				async: false,
				success:function(data) {
					$('#area').empty();
					$('#area').append('<option value="0">Select City</option>');
					for(x=0;x<data.data.length;x++){
						if(data.data[x].id==area){
							$('#area').append('<option selected value="'+data.data[x].id+'">'+data.data[x].major_area+'</option>');
						}else{
							$('#area').append('<option value="'+data.data[x].id+'">'+data.data[x].major_area+'</option>');
						}
					}	
				},
				error: function(data) {
					alert(data.status+" - "+data.statusText);
				}
		});
	}

	$(document).ready(function() {
		$("#txtEditor").Editor();
		$("#txtEditor").Editor('setText','{!! $store_info[0]->store_about !!}');
		
		$("#txtEditor2").Editor();
		$("#txtEditor3").Editor();
		$("#txtEditor4").Editor();
        var cid = $('#city').val();
		var area = $('#sArea').val();
		getArea(cid,area);
    });

    </script>
@endsection