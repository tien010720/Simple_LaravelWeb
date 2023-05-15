@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách hàng
                            <small>danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-30" style="padding-bottom:120px">
                     @if(session('thongbao'))
                        <div class="alert alert-success">
                           {{ session('thongbao') }}
                        </div>
                       @endif

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Giới Tính</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>SĐT</th>
                                <th>Ghi chú</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customer as $ctm)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $ctm->id }}</td>
                                <th>{{ $ctm->name }}</th>
                                <th>{{ $ctm->gender }}</th>
                                <th>{{ $ctm->email }}</th>
                                <th>{{ $ctm->address }}</th>
                                <th>{{ $ctm->phone_number }}</th>
                                <th>{{ $ctm->note }}</th>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/customer/xoa/{{ $ctm->id }}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/customer/sua/{{ $ctm->id }}">Edit</a></td>
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