@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản Phẩm
                            <small>{{ $products->name }}</small>
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

                        <form action="admin/product/sua/{{ $products->id }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                           
                            <div class="form-group">
                                <label>Tên Sản Phẩm</label>
                                <input class="form-control" name="name" placeholder="Nhập tên sản phẩm"  value="{{ $products->name }}" />
                            </div>

                            <div class="form-group">
                                <label>Loại Sản Phẩm</label>
                                <select class="form-control" name="ProductType" >
                                    @foreach($type_products as $tpr)
                                       <option value="{{ $tpr->id }}">{{ $tpr->name }}</option>
                                    @endforeach 
                                </select>
                            </div>
                             
                              
                            <div class="form-group">
                                <label>Miêu tả</label>
                                <textarea name="description" class="form-control" rows="3"> {{ $products->description }} </textarea>
                            </div>

                           <div class="form-group">
                                <label>Giá</label>
                                <input class="form-control" name="unit_price" placeholder=" " value="{{ $products->unit_price }}"  />
                            </div>

                            <div class="form-group">
                                <label>Giá Khuyến Mãi</label>
                                <input class="form-control" name="promotion_price" placeholder=" " value="{{ $products->promotion_price }}" />
                            </div>
                             
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                  <p>
                                <img width="400px" src="source/image/product/{{ $products->image }}">
                                  </p>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Unit</label>
                                <label class="radio-inline">
                                    <input name="unit" value="hộp" checked="" type="radio">Hộp
                                </label>
                                <label class="radio-inline">
                                    <input name="unit" value="cái" type="radio">Cái
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Mới</label>
                                <label class="radio-inline">
                                    <input name="new" value="1" checked="" type="radio">Có
                                </label>
                                <label class="radio-inline">
                                    <input name="new" value="0" type="radio">Không
                                </label>
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