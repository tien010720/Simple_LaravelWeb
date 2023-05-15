@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách Hàng
                            <small>{{ $customer->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">

                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{ $err  }} <br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{ session('thongbao') }}
                            </div>
                        @endif

                        <form action="admin/customer/sua/{{ $customer->id }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                           
                            <div class="form-group">
                                <label>Tên khách hàng</label>
                                <input class="form-control" name="name" placeholder="Nhập tên khách hàng" value="{{ $customer->name }}" />
                            </div>

                             <div class="form-group">
                                <label>Giới tính</label>
                                <label class="radio-inline">
                                    <input name="gender" value="Nam" checked="" type="radio">Nam
                                </label>
                                <label class="radio-inline">
                                    <input name="gender" value="Nữ" type="radio">Nữ
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Nhập email" value="{{ $customer->email }}" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="address" placeholder="Nhập địa chỉ" value="{{ $customer->address }}"/>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="phone_number" placeholder="Nhập SDT" value="{{ $customer->phone_number }}"/>
                            </div>
                            <div class="form-group">
                                <label>Ghi Chú</label>
                                <textarea name="note" class="form-control" rows="3"  >{{ $customer->note }}</textarea>
                            </div>
                            
                             <button type="submit" class="btn btn-success btn-lg">Sửa</button>
                            <button type="reset" class="btn btn-primary btn-lg">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection