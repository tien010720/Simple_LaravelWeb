<?php

 

Route::get('/', function () {
    return view('welcome');
});
            			// Phần giao diện admin

Route::get('admin/dangnhap','UserController@getDangnhapAdmin');
Route::post('admin/dangnhap','UserController@postDangnhapAdmin');
Route::get('admin/logout','UserController@getDangXuatAdmin');



Route::group(['prefix'=>'admin'],function(){

	Route::group(['prefix'=>'bill'],function(){
		// admin/bill/danhsach
		Route::get('danhsach','BillController@getDanhSach');

		Route::get('sua/{id}','BillController@getSua');
		Route::post('sua/{id}','BillController@postSua');

		Route::get('them','BillController@getThem');
		Route::post('them','BillController@postThem');

		Route::get('xoa/{id}','BillController@getXoa');
	});
 
    Route::group(['prefix'=>'billdetail'],function(){
		// admin/billdetail/danhsach
		Route::get('danhsach','BillDetailController@getDanhSach');

		Route::get('sua/{id}','BillDetailController@getSua');
		Route::post('sua/{id}','BillDetailController@postSua');

		Route::get('them','BillDetailController@getThem');
		Route::post('them','BillDetailController@postThem');

		Route::get('xoa/{id}','BillDetailController@getXoa');
	});

    

    Route::group(['prefix'=>'customer'],function(){
		// admin/customer/danhsach
		Route::get('danhsach','CustomerController@getDanhSach');

		Route::get('sua/{id}','CustomerController@getSua');
		Route::post('sua/{id}','CustomerController@postSua');

		Route::get('them','CustomerController@getThem');
		Route::post('them','CustomerController@postThem');

		Route::get('xoa/{id}','CustomerController@getXoa');
	});

   	Route::group(['prefix'=>'news'],function(){
		// admin/news/danhsach
		Route::get('danhsach','NewsController@getDanhSach');

		Route::get('sua/{id}','NewsController@getSua');
		Route::post('sua/{id}','NewsController@postSua');

		Route::get('them','NewsController@getThem');
		Route::post('them','NewsController@postThem');

		Route::get('xoa/{id}','NewsController@getXoa');
	});

    Route::group(['prefix'=>'product'],function(){
		// admin/product/danhsach
		Route::get('danhsach','ProductController@getDanhSach');

		Route::get('sua/{id}','ProductController@getSua');
		Route::post('sua/{id}','ProductController@postSua');

		Route::get('them','ProductController@getThem');
		Route::post('them','ProductController@postThem');

		Route::get('xoa/{id}','ProductController@getXoa');
	});

    Route::group(['prefix'=>'producttype'],function(){
		// admin/producttype/danhsach
		Route::get('danhsach','ProductTypeController@getDanhSach');

		Route::get('sua/{id}','ProductTypeController@getSua');
		Route::post('sua/{id}','ProductTypeController@postSua');

		Route::get('them','ProductTypeController@getThem');
		Route::post('them','ProductTypeController@postThem');

		Route::get('xoa/{id}','ProductTypeController@getXoa');
	});

    Route::group(['prefix'=>'comment'],function(){
    	Route::get('danhsach','CommentController@getDanhSach');
    	
		Route::get('xoa/{id}/{id_product}','CommentController@getXoa');
	});

    Route::group(['prefix'=>'slide'],function(){
		// admin/slide/danhsach
		Route::get('danhsach','SlideController@getDanhSach');

		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');

		Route::get('them','SlideController@getThem');
		Route::post('them','SlideController@postThem');

		Route::get('xoa/{id}','SlideController@getXoa');
	});

    Route::group(['prefix'=>'user'],function(){
		// admin/user/danhsach
		Route::get('danhsach','UserController@getDanhSach');

		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');

		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');

		Route::get('xoa/{id}','UserController@getXoa');
	});

});
   
 






// Phần giao diện wed
Route::get('index',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
]);

Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);

Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienHe'
]);

Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioiThieu'
]);

 

Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);

Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);
Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);

Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);

Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);
Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);

Route::get('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@getSignin'
]);

Route::post('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@postSignin'
]);

Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'PageController@postLogout'
]);

Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);


