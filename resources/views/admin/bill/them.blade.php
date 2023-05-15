@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bill
                            <small>Thêm</small>
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

                       <form action="admin/bill/them" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label>Tên Khách Hàng</label>
                                <select class="form-control" name="Customer">
                                    @foreach($customer as $ctm)
                                    <option value="{{ $ctm->id }}">{{ $ctm->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ngày Oder</label>
                                <input class="form-control" name="date_order" placeholder=" Năm-Tháng-Ngày " />
                            </div>
                            <div class="form-group">
                                <label>Tổng Tiền</label>
                                <input class="form-control" name="total" placeholder=" " />
                            </div>
                             
                            <div class="form-group">
                                <label>Hình Thức Thanh Toán</label><br>
                                <label class="radio-inline">
                                    <input name="payment" value="COD" checked="" type="radio">Thanh Toán Khi Nhận Hàng
                                </label>
                                <label class="radio-inline">
                                    <input name="payment" value="ATM" type="radio">Chuyển Khoản
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Ghi Chú</label>
                                <textarea name="note" class="form-control" rows="3"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-success btn-lg">Thêm</button>
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