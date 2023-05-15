<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Customer;

class BillController extends Controller
{
    //
    public function getDanhSach()
    {
    	$bill = Bill::all();
    	return view('admin.bill.danhsach',['bill'=>$bill]);
    }

    public function getThem()
    {
        $customer = Customer::all();
        $bill = Bill::all();
     return view('admin.bill.them',['customer'=>$customer,'bill'=>$bill]);
    }

    public function postThem(Request $request)
    {
            // Hàm validate để check các đk
         
        $bill = new Bill;
        $bill = new Customer;
        $bill->id_customer = $request->Customer;
        $bill->date_order = $request->date_order;
        $bill->total = $request->total;
        $bill->payment = $request->payment;
        $bill->note = $request->note;
        
        $bill->save();

        return redirect('admin/bill/them')->with('thongbao','Bạn đã thêm thành công');
    }
    public function getSua($id)
    {
        $customer = Customer::all();
        $bill = Bill::find($id);
        return view('admin.bill.sua',['bill'=>$bill,'customer'=>$customer]);
    }

    public function postSua(Request $request,$id)
    {
        $bill = new Bill;
        $bill->date_order = $request->date_order;
        $bill->total = $request->total;
        $bill->payment = $request->payment;
        $bill->note = $request->note;
        $bill->id_customer = $request->Customer;
        $bill->save();

        return redirect('admin/bill/sua')->with('thongbao','Bạn đã thêm thành công');
    }

    public function getXoa($id)
    {
        $bill = Bill::find($id);
        $bill->delete();

        return redirect('admin/bill/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
