@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Quyền</th>
                        <th>Phone</th>
                        <th>Địa Chỉ</th>
                        <th>Remember_Token</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $u)
                    <tr class="odd gradeX" align="center">
                             
                        <th>{{$u->id}}</th>
                        <th>{{$u->name}}</th>
                        <th>{{$u->email}}</th>
                        <td>{{$u->quyen}}
                                @if($u->quyen == 1)
                                {{ "Admin" }}
                                @else
                                {{ "Thường" }}
                                @endif
                            </td> 
                        <th>{{$u->phone}}</th>
                        <th>{{$u->address}}</th>
                        <th>{{$u->remember_token}}</th>

                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/xoa/{{ $u->id }}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/sua/{{ $u->id }}">Sửa</a></td>
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