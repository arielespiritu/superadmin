@extends('admin.master')

@section('title', 'Admin Panel')

@section('head')
@endsection

@section('content')
		
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
				<h4 class="page-header">Store Profile</h4>
					<div class="col-md-12">
						<h4>Store Info</h4>
						</br>
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-2">
									<p>Store Logo</p>
								</div>	
								<div class="col-md-5">
									<img src="{{ URL::asset('assets/account/default.png') }}" class="img-responsive" id="store_logo" style="border:1px solid gray; height:100px; width:300px;"/>
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
									<input class="form-control input-sm" name="display_name" id="display_name" type="text" placeholder="Store Name" value="{{$store_info[0]->display_name}}" required>
									</br>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="col-md-2">
									<p>FB Link Page</p>
								</div>	
								<div class="col-md-5">
									<input class="form-control input-sm" name="store_fb_link" id="store_fb_link" type="text" placeholder="Store FB Link" value="{{$store_info[0]->store_fb_link}}" required>
									</br>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="col-md-2">
									<p>Store Description</p>
								</div>	
								<div class="col-md-5">
									<textarea rows="4" class="form-control input-sm  " placeholder="Store Description" name="store_decription" required>{{$store_info[0]->store_description}}</textarea>
									</br>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="col-md-2">
									<p>Store State</p>
								</div>	
								<div class="col-md-5">
									<select class="form-control input-sm " id="city" name="city" value="{{$store_info[0]->store_city}}" required>
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
									<select class="form-control input-sm " id="area" name="area" value="" required>
										<option></option>
									</select>
									</br>
								</div>	
							</div>
						</div>
					</div>					
                </div>
            </div>
			<br>
			<br>
			<br>
        </div>

@endsection


@section('page-script')		

	<script>
	$('#city').on('change', function() {
		//alert( this.value ); // or $(this).val()
		var cid = this.value;
		getArea(cid);
	});
	
	function getArea(cid){
		$.ajax({
				type: "GET",
				url: "/location/get-city-area?cid="+cid,
				async: false,
				success:function(data) {
					$('#area').empty();
					$('#area').append('<option value="0">Select City</option>');
					for(x=0;x<data.data.length;x++){
						$('#area').append('<option value="'+data.data[x].id+'">'+data.data[x].major_area+'</option>');
					}	
				},
				error: function(data) {
					alert(data.status+" - "+data.statusText);
				}
		});
	}

    </script>
@endsection