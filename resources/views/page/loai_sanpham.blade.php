@extends('master')
@section('content')

<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h2 class="inner-title" >
					<span style="font-family: iCiel Cadena">
						<font color="#253951">
						 Sản phẩm {{$loai_sp->name}}
						</font></span>
				</h2>
				 
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Loại sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
						  @foreach($loai as $l)
							<li><a href="{{route('loaisanpham',$l->id)}}">{{$l->name}}
							</a></li>
						  @endforeach	 
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4><span style="font-family: iCiel Cadena">{{$loai_sp->name}}</span></h4>
							 					 <!-- Tên Loại Sản Phẩm -->
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_theoloai)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@foreach($sp_theoloai as $sp)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="ribbon-wrapper">
											@if($sp->promotion_price!=0)	
											     											 
											    <div class="ribbon sale">Sale</div>
											@endif
									    </div>
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$sp->id)}}"><img src="source/image/product/{{$sp->image}}" alt="" height="230px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp->name}}</p>
											<p class="single-item-price" style="font-size: 18px">
											    @if($sp->promotion_price==0)	
												<span class="flash-sale">{{number_format($sp->unit_price)}} đồng</span>
											@else
											    <span class="flash-del">{{number_format($sp->unit_price)}} đồng</span>
											    <span class="flash-sale">{{number_format($sp->promotion_price)}} đồng</span>	
											@endif	
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div> 
							@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4><span style="font-family: iCiel Cadena">Sản Phẩm Khác</span></h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_khacall)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
						    	@foreach($sp_khac as $sp_k)
								   <div class="col-sm-4">
									<div class="single-item">
										<div class="ribbon-wrapper">
											@if($sp_k->promotion_price!=0)	
											     											 
											    <div class="ribbon sale">Sale</div>
											@endif
									    </div>
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$sp_k->id)}}"><img src="source/image/product/{{$sp_k->image}}" alt="" height="200px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp_k->name}}</p>
											<p class="single-item-price" style="font-size: 18px">
											    @if($sp_k->promotion_price==0)	
												<span class="flash-sale">{{number_format($sp_k->unit_price)}} đồng</span>
											@else
											    <span class="flash-del">{{number_format($sp_k->unit_price)}} đồng</span>
											    <span class="flash-sale">{{number_format($sp_k->promotion_price)}} đồng</span>	
											@endif	
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								   </div> 
							    @endforeach
							</div>
							<div class="row">{{$sp_khac->links()}}</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
</div> <!-- .container -->
@endsection