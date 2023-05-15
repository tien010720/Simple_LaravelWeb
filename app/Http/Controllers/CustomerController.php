<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Customer;

class CustomerController extends Controller
{
    //
    public function getDanhSach()
    {
    	$customer = Customer::all();
    	return view('admin.customer.danhsach',['customer'=>$customer]);
    }

    public function getThem()
    {
        $customer = Customer::all();
     return view('admin.customer.them',['customer'=>$customer]);
    }

    public function postThem(Request $request)
    {
            // Hàm validate để check các đk
        $this->validate($request,
            [
                'name' => 'required|unique:Customer,name|min:3',
                'email' => 'required|email|unique:Customer,email',
                'address' => 'required',
                'phone_number' => 'required',
                'note' => 'required'
               
                
            ],
            [
                'name.unique' => 'Tên khách hàng đã tồn tại',
                'name.requires' => 'Bạn chưa nhập tên khách hàng',
                'name.min' => 'Tên khách hàng phải có độ dài từ 3 cho đến 100 ký tự',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn chưa nhập đúng định dạng email',
                'email.unique' => 'Email đã tồn tại',
                'address.requires' => 'Bạn chưa nhập địa chỉ',
                'phone_number.requires' => 'Bạn chưa nhập SĐT',
                'note.requires' => 'Bạn chưa nhập ghi chú'
                 
            ]);

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone_number;
        $customer->note = $request->note;
        $customer->save();

        return redirect('admin/customer/them')->with('thongbao','Thêm thành công !!!');
    }
    public function getSua($id)
    {
      
        $customer = Customer::find($id);
        return view('admin.customer.sua',['customer'=>$customer]);
    }

    public function postSua(Request $request,$id)
    {
        $this->validate($request,
            [
                'name' => 'required|unique:Customer,name|min:3',
                
                
            ],
            [
                'name.unique' => 'Tên khách hàng đã tồn tại',
                'name.requires' => 'Bạn chưa nhập tên khách hàng',
                'name.min' => 'Tên khách hàng phải có độ dài từ 3 cho đến 100 ký tự'
                 
                 
            ]);
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone_number;
        $customer->note = $request->note;
        $customer->save();

        return redirect('admin/customer/sua/'.$id)->with('thongbao','Sửa thành công !!!');
    }

    public function getXoa($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect('admin/customer/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
