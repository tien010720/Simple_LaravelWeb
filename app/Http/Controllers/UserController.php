<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    //
    public function getDanhSach()
    {
       
      $user = User::all();  
      return view('admin.user.danhsach',['user'=>$user]);
    }
    public function getThem()
    {
       return view('admin.user.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:3|max:32',
                'passwordAgain' => 'required|same:password',
                'phone' => 'required',
                'address' => 'required',
            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng',
                'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn chưa nhập đúng định dạng email',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu phải có ít nhất 3 ký tự',
                'password.max' => 'Mật khẩu chỉ được tối đa 32 ký tự',
                'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same' => 'Mật khẩu nhập lại chưa khớp',
                'phone.required' => 'Bạn chưa nhập SĐT',
                'address.required' => 'Bạn chưa nhập địa chỉ'
            ]);

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->quyen = $request->quyen;
            $user->save();

            return redirect('admin/user/them')->with('thongbao','Thêm thành công');
            
    }

    // function getsua giúp ta đưa thông tin sang trang sửa loại tin
    public function getSua($id)  
    {
        $user = User::find($id);
        return view('admin.user.sua',['user'=>$user]);
    }

    public function postSua(Request $request,$id)
    {
      $this->validate($request,
            [
                'name' => 'required|min:3',
                 
                'phone' => 'required',
                'address' => 'required',
            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng',
                'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
               
                'phone.required' => 'Bạn chưa nhập SĐT',
                'address.required' => 'Bạn chưa nhập địa chỉ'
            ]);

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->quyen = $request->quyen;
            $user->save();

            return redirect('admin/user/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }

    public function getXoa($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/danhsach')->with('thongbao','Xóa người dùng thành công');
    }

    public function getDangnhapAdmin()
    {   
        return view('admin.login');
    }
    public function postDangnhapAdmin(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required|min:3|max:32',
        ],[
            'name.required'=>'Bạn chưa nhập UserName',
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'Password không được nhỏ hơn 3 ký tự',
            'password.max'=>'Password không được lớn hơn 32 ký tự'
        ]);
        if(Auth::attempt(['name'=>$request->name,'password'=>$request->password]))
        {
            return redirect('admin/product/danhsach');
        }
        else
        {
            return redirect('admin/dangnhap')->with('thongbao','Bạn Không Thuộc Quyền Đăng Nhập !!!');
        }
    }

    public function getDangXuatAdmin()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}
