@extends('admin.admin')
@section('content')
    <div class="col-md-12">
        <div class="panel panel-default panel-border-color panel-border-color-primary">
            <div class="panel-heading panel-heading-divider">
                <h3>Setting Admin</h3>
                <ol class="breadcrumb page-head-nav">
                    <li><a href="/admin/user">Trang chủ</a></li>
                    <li class="active">Setting Admin</li>
                </ol>
            </div>
            <div class="panel-body">
                <form method="post" action="/admin/update/{{ $user->id }}" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Đồng hồ đếm ngược </label>
                        <div class="col-sm-6">
                           <div class='input-group date' id='datetimepicker1'>
			                    <input type='text' value="{{ $user->reverse_date }}" name="reverse_date" class="form-control" />
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
		                    </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 control-label">
                            <button type="submit" class="btn btn-space btn-primary">Sửa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection