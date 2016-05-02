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
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Rendering engine</th>
                                            <th>Browser</th>
                                            <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>CSS grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>Trident</td>
                                            <td>Internet Explorer 4.0</td>
                                            <td>Win 95+</td>
                                            <td class="center">4</td>
                                            <td class="center">X</td>
                                        </tr>
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

@endsection