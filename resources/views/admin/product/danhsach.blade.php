@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản Phẩm
                            <small>danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12" style="padding-bottom:120px">
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                           {{ session('thongbao') }}
                        </div>
                       @endif

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên SP</th>
                                <th>Loại Sản Phẩm</th>
                                <th>Miêu tả</th>
                                <th>Giá</th>
                                <th>Giá Khuyến Mãi</th>
                                <th>Hình Ảnh</th>
                                <th>Unit</th>
                                <th>New</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($products as $prd)
                           <tr class="odd gradeX" align="center">
                                <td>{{ $prd->id }}</td>
                                <th>{{ $prd->name }}</th>
                                <td>{{ $prd->product_type->name }}</td>
                                <th>{{ $prd->description }}</th>
                                <td>{{ $prd->unit_price }}</td>
                                <th>{{ $prd->promotion_price }}</th>
                                <td>
                                     <img width="350px" height="200px"  src="source/image/product/{{ $prd->image }}">
                                </td>
                                
                                <th>{{ $prd->unit }}</th>
                                <th>{{ $prd->new }}</th>
                                
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/xoa/{{ $prd->id }}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/sua/{{ $prd->id }}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection 