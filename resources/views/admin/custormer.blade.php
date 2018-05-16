@extends('admin.admin')
@section('content')
<div class="row">
	<div class="page-head">
       <a class="btn btn-info btn-lg pull-right"  data-toggle="modal" data-target="#myModal">Tìm Kiếm</a>
		<h2 class="page-head-title">Quản lý khách hàng</h2>
		
		<ol class="breadcrumb page-head-nav">
			<li><a href="#">Trang chủ</a></li>
			<li class="active">Quản lý khách hàng</li>
		</ol>
		
	</div>

</div>
<div class="col-sm-12">
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Tìm kiếm quản lý</h4>
				</div>
				<div class="modal-body">
					<form action="{{url('admin/custosmer/search')}}" method="POST" role="form">
						<div class="dropdown">
						  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
						  <span class="caret"></span></button>
						  <ul class="dropdown-menu">
						    <li><a href="#">HTML</a></li>
						    <li><a href="#">CSS</a></li>
						    <li><a href="#">JavaScript</a></li>
						  </ul>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success" data-dismiss="modal">Tìm kiếm</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default panel-table">
		<div class="panel-body">
			<table class="table table-striped table-borderless">
				<thead>
					<tr>
						<th style="width:2%;">#</th>
						<th style="width:20%;">Tên</th>
						<th style="width:10%;">Số điện thoại</th>
						<th style="width:43%;">Địa chỉ</th>
						<th style="width:15%;">Ngày mua</th>
						<th style="width:10%;">Trang thái</th>
						<th>#</th>
					</tr>
				</thead>
				
				<tbody class="no-border-x">
					@if(count($custormers) === 0)
					<tr >
						<td style="text-align: center;" colspan="6">Không có dữ liệu</td>
					</tr>
					@else
						@foreach($custormers as $custormer)
						<tr>
							<td>{{ $custormer->id }}</td>
							<td>{{ $custormer->name }}</td>
							<td>{{ $custormer->phone }}</td>
							<td>{{ $custormer->address }}</td>
							<td>{{ $custormer->created_at }}</td>
							<td>{{ $custormer->status }}</td>
							<td><a href="#" class="icon"><i class="mdi mdi-delete"></i></a></td>
						</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
		<div class="pull-right">
			@if(count($custormers) !== 0)
			{!! $custormers->links() !!}
			@endif
		</div>
			
	</div>

</div>

@endsection