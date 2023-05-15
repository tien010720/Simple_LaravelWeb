@extends('admin.layout.index')
@section('content')
  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>{{ $user->name }}</small>
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

                        <form action="admin/user/sua/{{ $user->id}}" method="POST">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            
                             
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" name="name" placeholder="Nhập tên người dùng" 
                                value="{{$user->name}}" />
                            </div>
                           
                           <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control password" name="email" placeholder="Nhập địa chỉ email" value="{{$user->email}}"  readonly="" />
                            </div>

                            <div class="form-group">
                                 
                                <label>Đổi mật khẩu</label>
                                <input type="password" class="form-control password" name="password" placeholder="Nhập mật khẩu"  
                                />
                            </div>

                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password"  class="form-control" name="passwordAgain" placeholder="Nhập lại mật khẩu"   />
                            </div>

                           <div class="form-group">
                                <label>Phone</label>
                                <input type="phone" class="form-control" name="phone" placeholder="Nhập SĐT" value="{{$user->phone}}"/>
                            </div>
                            
                            <div class="form-group">
                                <label>Địa Chỉ</label>
                                <input type="address" class="form-control" name="address" placeholder="Nhập địa chỉ" value="{{$user->address}}"/>
                            </div>

  
                            <div class="form-group" >
                                <label>Quyền người dùng</label>

                                <label class="radio-inline">
                                    <input name="quyen" value="0" 
                                    @if($user->quyen == 0)
                                    {{"checked"}}
                                    @endif
                                    type="radio">Thường
                                </label>

                                <label class="radio-inline">
                                    <input name="quyen" 
                                    @if($user->quyen == 1)
                                    {{"checked"}}
                                    @endif
                                    value="1" checked="" type="radio">Admin
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

@section('script')
        <script>
            $(document).ready(function(){
                 $("#TheLoai").change(function(){
                    var idTheLoai = $(this).val();
                    alert(idTheLoai);
                    $.get("admin/ajax/loaitin/"+idTheLoai,function(data){
                         
                          $('#LoaiTin').html(data);
                     });
                 });
            });
        </script>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if($(this).is(":checked"))
            {
                $(".password").removeAttr('disabled');
            }
            else
            {
                $(".password").attr('disabled','');
            }

            });
        });
    </script>

@endsection