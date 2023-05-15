@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Link
                            <small>{{ $slide->link }}</small>
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

                        <form action="admin/slide/sua/{{ $slide->id }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                           
                            <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="link" placeholder="Nhập Link" value="{{ $slide->link }}" />
                            </div>

                              
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                  <p>
                                <img width="400px" src="source/image/slide/{{ $slide->image }}">
                                  </p>
                                <input type="file" name="image" class="form-control">
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