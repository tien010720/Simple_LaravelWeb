   <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span style="font-family: iCiel Cadena" ><font color="#253951">
                <a class="navbar-brand" href="{{route('trang-chu')}}">Công Ty TNHH Tin Học Lê Vương- Home</a> </font></span>
  </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        @if(Auth::check())
                        <center>
                        <li><p><i  class=" fa fa-user fa-fw"></i>{{Auth::user()->name}}</a>
                        </li>
                        <li><a href="admin/user/sua/{{Auth::user()->id}}"><i class="fa fa-gear fa-fw"></i> Thông Tin </a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="admin/dangnhap"><i class="fa fa-sign-out fa-fw"></i> Đăng Xuất</a>
                        </li>
                       </center>
                        @endif
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

          @include('admin.layout.menu')
            <!-- /.navbar-static-side -->
        </nav>  