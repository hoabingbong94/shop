@extends('admin.admin')
@section('content')
    <div class="row">
        <div class="page-head">
            <h2 class="page-head-title">Quản lý khách hàng</h2>
            <a class="pull-right btn btn-info" title="reload" style="margin-right: 5px;" href="/admin/custormer"><i
                        class="mdi mdi-refresh-alt"></i></a>
            <ol class="breadcrumb page-head-nav">
                <li><a href="#">Trang chủ</a></li>
                <li class="active">Quản lý khách hàng</li>
            </ol>
        </div>
    </div>
    <div class="col-sm-12">
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
                    <tr>
                        <form method="get" accept-charset="utf-8" inputdefaults="" action="{{url('admin/custormer')}}">
                            <th class="hasinput" width="">
                                <input type="hidden" name="search" value="1">
                            </th>
                            <th class="hasinput">
                                <div class=""><input type="text" style="height: 35px;" name="name" class="form-control"
                                                     placeholder="Tên" value="{{ !empty($params['name']) ? $params['name'] : '' }}" id="s-title"></div>
                            </th>
                            <th class="hasinput" width="">
                                <div class="">
                                    <input type="text" style="height: 35px;" name="phone" class="form-control"
                                           placeholder="Số điện thoại" id="s-title" value="{{ !empty($params['phone']) ? $params['phone'] : ''  }}"></div>
                            </th>
                            <th class="hasinput" width=""></th>
                            <th></th>
                            <th class="hasinput" width="">
                                <div class="input select">
                                    <select style="height: 40px;" name="status" class="form-control"
                                            placeholder="Trang thái"
                                            id="s-status">
                                        <option value="">--Chọn--</option>
                                        @foreach(\App\AppConst\Constants::STATUS as $key => $item)
                                            <option {{ strval($selected) === strval($key) ? 'selected="selected"' : '' }} value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </th>
                            <th class="hasinput text-center">
                                <button style=" padding:8px 15px;" title="Tìm kiếm" type="submit" class="searcht"><i
                                            class="mdi mdi-search"></i></button>
                            </th>
                        </form>
                    </tr>
                    </thead>
                    <tbody class="no-border-x">
                    @if(count($custormers) === 0)
                        <tr>
                            <td style="text-align: center;" colspan="7">Không có dữ liệu</td>
                        </tr>
                    @else
                        @foreach($custormers as $custormer)
                            <tr>
                                <td>{{ $custormer->id }}</td>
                                <td>{{ $custormer->name }}</td>
                                <td>{{ $custormer->phone }}</td>
                                <td>{{ $custormer->address }}</td>
                                <td>{{ $custormer->created_at }}</td>
                                <td
                                        @if ($custormer->status == 0)
                                        class="alert alert-warning alert-dismissible"
                                        @elseif($custormer->status == 1)
                                        class="alert alert-success alert-dismissible"
                                        @else
                                        class="alert alert-danger alert-dismissible"
                                        @endif

                                >{{ \App\AppConst\Constants::STATUS[$custormer->status] }}</td>
                                <td><a title="Sửa trạng thái" style="margin-left: 10px;" href="/admin/custormer/form/{{ $custormer->id }}" class="icon"><i class="mdi mdi-wrench"></i></a></td>
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