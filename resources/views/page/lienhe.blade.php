@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h5 class="inner-title">
					<span style="font-family: iCiel Cadena">
					<font color="#253951">
						Liên Hệ 
					</font></span>
			    </h5>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Liên Hệ</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src=" https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2697.556374009599!2d108.25034998595798!3d15.975496162135057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb6b69ccb0aa44c72!2zS8O9IFTDumMgWMOhIFPhu5EgMiBUcsaw4budbmcgQ2FvIMSQ4bqzbmcgQ8O0bmcgTmdo4buHIFRow7RuZyBUaW4gLSDEkOG6oWkgSOG7jWMgxJDDoCBO4bq1bmc!5e0!3m2!1svi!2s!4v1557407808127!5m2!1svi!2s"width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Gởi thư nhận xét của bạn</h2>
					<div class="space20">&nbsp;</div>
					<p>Chúng tôi sẻ trả lời nhanh nhất những câu hỏi thắc mắc liên quan về sản phẩm bên chúng tôi</p>
					<div class="space20">&nbsp;</div>
					<form action="#" method="post" class="contact-form">	
						<div class="form-block">
							<input name="your-name" type="text" placeholder="Tên của bạn">
						</div>
						<div class="form-block">
							<input name="your-email" type="email" placeholder="Địa chỉ email của bạn">
						</div>
						<div class="form-block">
							<input name="your-subject" type="text" placeholder="Số điện thoại">
						</div>
						<div class="form-block">
							<textarea name="your-message" placeholder="Nội dung	"></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Gửi<i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Thông Tin Liên Lạc</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa chỉ</h6>
					<p>
						Công Ty TNHH Tin Học Lê Vương <br>
						31 Kim Đồng – Khu Phố 10 – TT Gio Linh, Gio Linh, Quảng Trị 
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Email</h6>
					<p>
					  <a href="butky2705@gmail.com">tinhoclevuong@gmail.com</a>
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Số Điện Thoại</h6>
					<p>
						091 777 42 34<br>
						LV <br>
						 
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection