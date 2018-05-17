@extends('admin.admin')
@section('content')
    <div class="col-md-12">
        <div class="panel panel-default panel-border-color panel-border-color-primary">
            <div class="panel-heading panel-heading-divider">
                <h3>Quản lý khách hàng</h3>
                <ol class="breadcrumb page-head-nav">
                    <li><a href="/admin/custormer">Trang chủ</a></li>
                    <li class="active">Quản lý khách hàng</li>
                    <li class="active">Sửa</li>
                </ol>
            </div>
            <div class="panel-body">
                <form method="post" action="/admin/custormer/update/{{ $custormer->id }}" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tên</label>
                        <div class="col-sm-6">
                            <input type="text" disabled="disabled" placeholder="{{ $custormer->name }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Địa chỉ</label>
                        <div class="col-sm-6">
                            <input type="text" disabled="disabled" placeholder="{{ $custormer->address }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Số điện thoại</label>
                        <div class="col-sm-6">
                            <input type="text" disabled="disabled" placeholder="{{ $custormer->phone }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ngày mua</label>
                        <div class="col-sm-6">
                            <input type="text" disabled="disabled" placeholder="{{ $custormer->created_at }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Trạng thái</label>
                        <div class="col-sm-2">
                            <select class="form-control" name="status" id="">
                                @foreach(\App\AppConst\Constants::STATUS as $key => $item)
                                <option {{ $custormer->status == $key ? "selected='selected'" : ""}} value="{{ $key}}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 control-label">
                            <button type="submit" class="btn btn-space btn-primary">Sửa</button>
                            <button class="btn btn-space btn-default">Thoát</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection