@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			 
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Trang Chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="source/image/product/{{$sanpham -> image}}" alt=""  height="250px"  >
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h2>{{$sanpham -> name}}</h2></p>
							    </br>
								<p class="single-item-price"><h5>
									@if($sanpham->promotion_price==0)	
												<span class="flash-sale">&nbsp;&nbsp;&nbsp;&nbsp;{{number_format($sanpham->unit_price)}} đồng</span>
											@else
											    <span class="flash-del"> {{number_format($sanpham->unit_price)}} đồng</span>
											    <span class="flash-sale"> {{number_format($sanpham->promotion_price)}} đồng</span>	
											@endif
								</p></h5>
							</div><hr>

							<div class="clearfix"></div>
							 

							 <font color="Green"><span style="font-size: 20px" color="red">
						  				<i class="fa fa-truck" aria-hidden="true"></i> 
						  				&nbsp; Free ship khu vực TT Gio Linh, Quảng Trị &nbsp;&nbsp;  
						  				 
										</span>
							    </font><br>
							
							 <font color="Teal"><span style="font-size: 20px">
								<i class="fa fa-map-marker"></i>
								&nbsp;&nbsp;31 Kim Đồng – Khu Phố 10 – TT Gio Linh, Gio Linh, Quảng Trị 
								
						    </span><br></font> 

					 
							     <font color="Maroon"><span style="font-size: 20px">
							     	   <i class="fa fa-clock-o" aria-hidden="true"></i>
							     			   &nbsp; Giờ mở cửa: 07:00 – 23:00
							     </span><br> </font>
					 
							    
							    <hr>
 
  							 
							{{-- đánh giá --}}
							<h5>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
						    </h5>
							{{-- End Đánh Giá --}}
							 

							<p>Số Lượng:</p>
							<div class="single-item-options">								 
								<select class="wc-select" name="color">

									 
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select> 
								<a class="add-to-cart" href="{{route('themgiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
{{-- Đánh Giá  --}}
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô Tả</a></li>
							<li><a href="#tab-reviews">Đánh giá</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$sanpham -> description}}</p>
						</div>
						<div class="panel" id="tab-reviews">

				{{-- Viết Bình Luận --}}
								<div class="well">
									<h6>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h6>
									<form action="" role="form">
										<div class="form-group">
											<textarea class="form-control" rows="3"></textarea>
										</div>
										<button type="submit" class="btn btn-success">Gửi</button>
									</form>
								</div>
				{{-- Commnet  --}}
								 
								 
								<div class="media">
									<a class="pull-left" href="#">
										<img class="media-object" src="source/image/product/comment.png" alt="">
									</a>
									<div class="media-body">
										
										 
									</div>
								</div>
								 

				{{-- end Comment --}}
						</div>
					</div>
{{-- end Đánh Giá --}}
                    <div class="space50">&nbsp;</div>
					<div class="beta-products-list">

						<h4>Sản phẩm tương tự</h4></BR>

						<div class="row">
						  @foreach($sp_tuongtu as $sptt)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="ribbon-wrapper">
											@if($sptt->promotion_price!=0)	
											     											 
											    <div class="ribbon sale">Sale</div>
											@endif
									    </div>
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$sptt->id)}}"><img src="source/image/product/{{$sptt->image}}" alt="" height="210px" width="270px" ></a>
									</div>
									<div class="single-item-body"> 
										<p class="single-item-title"> {{$sptt->name}} </p>
										<p class="single-item-price" style="font-size: 18px"> 
											@if($sptt->promotion_price==0)	
												<span class="flash-sale">{{number_format($sptt->unit_price)}} đồng</span>
											@else
											    <span class="flash-del">{{number_format($sptt->unit_price)}} đồng</span>
											    <span class="flash-sale">{{number_format($sptt->promotion_price)}} đồng</span>	
											@endif
										</p> 
									</div> 
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						  @endforeach	 
						</div>
						<div class="row">{{$sp_tuongtu->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>

{{-- Nước Uống --}}

				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Laptop  </h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',20)}}"><img src="source/image/product/hp2.jpg" alt="" ></a>
									<div class="media-body">
										Laptop HP Pallivion<br>
										<span class="beta-sales-price">10.000.000 VNĐ</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',21)}}"><img src="source/image/product/Acer4.jpg" alt=""></a>
									<div class="media-body">
										Laptop Acer core i5<br>
										<span class="beta-sales-price">12.000.000 VNĐ</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',22)}}" ><img src="source/image/product/d1.jpg" alt=""></a>
									<div class="media-body">
										Laptop Dell core i5<br>
										<span class="beta-sales-price">12.000.000 VNĐ</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',29)}}" ><img src="source/image/product/l5.jpg" alt=""></a>
									<div class="media-body">
										Laptop Lenovo<br>
										<span class="beta-sales-price">15.000.000 VNĐ</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
{{-- End Nước Uống --}}
{{-- Các Loại Kem --}}
					<div class="widget">
						<h3 class="widget-title">Thiết bị phần cứng</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',4)}}"><img src="source/image/product/bp1.jpg" alt=""></a>
									<div class="media-body">
										Bàn phím<br>
										<span class="beta-sales-price">300,000 VNĐ</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',16)}}"><img src="source/image/product/ch2.jpg" alt=""></a>
									<div class="media-body">
										Chuột<br>
										<span class="beta-sales-price">320.000 VNĐ</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',12)}}"><img src="source/image/product/taingh1.jpg" alt=""></a>
									<div class="media-body">
										Tai nghe <br>
										<span class="beta-sales-price">400.000 VNĐ</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',19)}}"><img src="source/image/product/ram2.jpg" alt=""></a>
									<div class="media-body">
										Ram <br>
										<span class="beta-sales-price">1.000.000 VNĐ</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection