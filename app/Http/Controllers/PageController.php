<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use App\Comment;
use Hash;
use Auth;

class PageController extends Controller
{


    
    //
    public function getIndex(){
        $slide = Slide::all();
        // return view('page.trangchu',['slide'=>$slide]);
        $new_product =  Product::where('new',1)->paginate(8);
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }

    public function getLoaiSp($type){
        $sp_theoloai = Product::where('id_type',$type)->get();  
        $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id',$type)->first();
        $sp_khacall = Product::all();
        return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp','sp_khacall'));
    }

    public function getChitiet(Request $req){
        $sanpham = Product::where('id',$req->id)->first();
        
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(6);
        return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu'));
    }
     
     public function getLienHe(){
        return view('page.lienhe');
    }
    
    public function getGioiThieu(){
        return view('page.gioithieu');
    }

    

    public function getAddtoCart(Request $req, $id){
        $Product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($Product, $id);
        $req->Session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart); 
        }
        else{
            Session::forget('cart');
        }
        return redirect()-> back();
    }

   public function getCheckout(){
        return view('page.dat_hang');
    } 


    public function postCheckout(Request $req){
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công ✔');

    }

   public function getLogin(){
        return view('page.dangnhap');
   }

   public function getSignin(){
        return view('page.dangky');
   }

   public function postSignin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:3|max:20',
                'name'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 3 kí tự'
            ]);
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->quyen = $req->quyen;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }


    public function postLogin(Request $req){
        $this->validate($req,
            [
                'name'=>'required',
                'password'=>'required|min:3|max:20'
            ],
            [
                'email.required'=>'Vui Lòng Nhập Username !!!',
                
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 3 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]
        );
        $credentials = array('name'=>$req->name,'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect()->route('trang-chu')->with(['flag'=>'success','message'=>'Đăng Nhập Thành Công !']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng Nhập Không Thành Công !']);
        }
    }
    public function postLogout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }

    public function getSearch(Request $req){
        $product = Product::where('name','like','%'.$req->key.'%')
                          ->orWhere('unit_price',$req->key)
                          ->get();
        return view('page.search',compact('product'));
    }
}
