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
				<h4 class="page-header">Orders</h4>
							<div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-orders">
                                    <thead>
                                        <tr>
                                            <th style="width:5%;">No</th>
                                            <th style="width:20%;">Order #</th>
											<th style="width:20%;">Tracking #</th>
                                            <th style="width:20%;">Customer Name</th>
                                            <th style="width:15%;">Ship to</th>
                                            <th style="width:15%;">Bill to</th>
											<th style="width:15%;">Order Date</th>
                                            <th style="width:15%;">Status</th>
											<th style="width:15%;">Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $num =1; ?>
                                        <tr class="odd gradeX">
                                            <td>{{$num++}}</td> 
                                        </tr>
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
        $('#dataTables-orders').DataTable({
                responsive: true
        });
		$('[data-toggle="tooltip"]').tooltip(); 
    });
	


    </script>
@endsection