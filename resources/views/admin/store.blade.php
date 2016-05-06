@extends('admin.master')

@section('title', 'Admin Panel')

@section('head')
	<!-- DataTables CSS -->
    <link href="{{ URL::asset('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section('content')
		
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
				<h4 class="page-header">Stores</h4>
							<div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-store">
                                    <thead>
                                        <tr>
                                            <th style="width:5%;">No</th>
                                            <th style="width:20%;">Store Name</th>
											<th style="width:20%;">Display Name</th>
                                            <th style="width:20%;">Created Date</th>
                                            <th style="width:15%;">Status</th>
                                            <th style="width:15%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $num =1; ?>
									@foreach($store as $store_info)
                                        <tr class="odd gradeX">
                                            <td>{{$num++}}</td>
                                            <td><a href="http://{{$store_info->store_name}}.homemallph.com">{{$store_info->store_name}}</a></td>
											<td>{{$store_info->display_name}}</td>
											<td>{{$store_info->created_at}}</td>
											<td>
											<select class="form-control input-sm " id="store_status" name="store_status" value="{{$store_info->store_status}}" onchange="setStoreStatus({{$store_info->id}},this.value)" required>
												@if($store_info->store_status=='11')
													<option selected value="11">EMAIL VERIFICATION</option>
													<option value="25">ACTIVATED</option>
													<option value="13">VERIFIED</option>
													<option value="12">DEACTIVATE</option>
												@elseif($store_info->store_status=='25')
													<option value="11">EMAIL VERIFICATION</option>
													<option selected value="25">ACTIVATED</option>
													<option value="13">VERIFIED</option>
													<option value="12">DEACTIVATE</option>
												@elseif($store_info->store_status=='13')
													<option value="11">EMAIL VERIFICATION</option>
													<option value="25">ACTIVATED</option>
													<option selected value="13">VERIFIED</option>
													<option value="12">DEACTIVATE</option>
												@elseif($store_info->store_status=='12')
													<option value="11">EMAIL VERIFICATION</option>
													<option value="25">ACTIVATED</option>
													<option value="13">VERIFIED</option>
													<option selected value="12">DEACTIVATE</option>
												@endif
											</select>
											</td>
											<td>
											<a href="/product/store/{{$store_info->id}}" class="btn btn-default btn-xs" data-toggle="tooltip" title="View Products"><i class="fa fa-tag" aria-hidden="true"></i></a>
											<a href="" class="btn btn-default btn-xs" data-toggle="tooltip" title="View Orders"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
											<a href="" class="btn btn-default btn-xs" data-toggle="tooltip" title="Collections"><i class="fa fa-money" aria-hidden="true"></i></a>
											<a href="/store/{{$store_info->id}}" class="btn btn-default btn-xs" data-toggle="tooltip" title="Store Profile"><i class="fa fa-eye" aria-hidden="true"></i></a>
											<a target="_blank" href="http://{{$store_info->store_name}}.homemallph.com" class="btn btn-default btn-xs" data-toggle="tooltip" title="View Website"><i class="fa fa-globe" aria-hidden="true"></i></a>
											
											</td>
                                        </tr>
									@endforeach
                                    </tbody>
                                </table>
							</div>	
							</br>
							</br>

                </div>
            </div>
			<br>
			<br>
			<br>
        </div>

@endsection


@section('page-script')		
    <script src="{{ URL::asset('assets/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/bower_components/datatables-responsive/js/dataTables.responsive.js') }}"></script>

	 <script>
    $(document).ready(function() {
        $('#dataTables-store').DataTable({
                responsive: true
        });
		$('[data-toggle="tooltip"]').tooltip(); 
    });
	
	function setStoreStatus(sid,val){
		$.ajax({
				type: "POST",
				url: "/store/set-store-status/"+sid,
				data: {sid: sid, status : val},
				async: true,
				success:function(data) {
					//alert(JSON.stringify(data));
				},
				error: function(data) {
					alert(data.status+" - "+data.statusText);
				}
		});
	}

    </script>
@endsection