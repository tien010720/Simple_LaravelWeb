@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại Sản Phẩm
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
                                <th>Hình Ảnh</th>
                                <th>Miêu tả</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($type_products as $tpr)
                           <tr class="odd gradeX" align="center">
                                <td>{{ $tpr->id }}</td>
                                <th>{{ $tpr->name }}</th>
                                <td>
                                     <img width="400px" height="200px"  src="source/image/product/{{ $tpr->image }}">
                                </td>
                                <th>{{ $tpr->description }}</th>
                                
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/producttype/xoa/{{ $tpr->id }}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/producttype/sua/{{ $tpr->id }}">Edit</a></td>
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