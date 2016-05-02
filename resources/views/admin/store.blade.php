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
                                            <th style="width:5%;">ID</th>
                                            <th style="width:20%;">Store Name</th>
											<th style="width:20%;">Display Name</th>
                                            <th style="width:20%;">Created Date</th>
                                            <th style="width:10%;">Status</th>
                                            <th style="width:25%;"></th>
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
											<td>{{$store_info->indicator->indicator_name}}</td>
											<td></td>
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
    <script src="{{ URL::asset('assets/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/bower_components/datatables-responsive/js/dataTables.responsive.js') }}"></script>

	 <script>
    $(document).ready(function() {
        $('#dataTables-store').DataTable({
                responsive: true
        });
    });
    </script>
@endsection