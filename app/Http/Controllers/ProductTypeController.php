<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;

class ProductTypeController extends Controller
{
    //
    public function getDanhSach()
    {
    	$type_products = ProductType::all();
    	return view('admin.producttype.danhsach',['type_products'=>$type_products]);
    }

    public function getThem()
    {

     $products = Product::all();
     $type_products = ProductType::all();
        return view('admin.producttype.them',['type_products'=>$type_products,'products'=>$products]);
    }

    public function postThem(Request $request)
    {
            // Hàm validate để check các đk
      $this->validate($request,
            [
                 'name'=>'required|min:3|unique:type_products,name',
                 'description'=>'required',
                 'image'=> 'required'
                 
            ],
            [
                'name.required'=>'Bạn chưa chọn loại tin',
                'name.min'=>'Tên phải có ít nhất 3 ký tự',
                'name.unique'=>'Tên Loại sản phẩm đã tồn tại',
                'description.required'=>'Bạn chưa nhập mô tả',
                'image.required'=>'Bạn chưa chọn hình ảnh'

                 
            ]);
         $products = new Product;
         $type_products = new ProductType;
         $type_products->name = $request->name;
         $type_products->description = $request->description;
         $type_products->image = $request->image;
         $type_products->save();

         return redirect('admin/producttype/them')->with('thongbao','Thêm Thành Công');
    }
    public function getSua($id)
    {
      
        $type_products = ProductType::find($id);
        return view('admin.producttype.sua',['type_products'=>$type_products]);
    }

    public function postSua(Request $request,$id)
    {
        $this->validate($request,
            [
                'name' => 'required|min:3',
                
                
            ],
            [
                'name.requires' => 'Bạn chưa nhập tên khách hàng',
                'name.min' => 'Tên khách hàng phải có độ dài từ 3 cho đến 100 ký tự'
                 
                 
            ]);
         $type_products = ProductType::find($id);
         $type_products->name = $request->name;
         $type_products->description = $request->description;
        
         
         if($request->hasFile('image'))
         {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' &&  $duoi != 'png' && $duoi != 'jpeg')
              {
                return redirect('admin/producttype/sua')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');

              }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_". $name;
            while (file_exists("source/image/product/".$image))
            {
                $image = str_random(4)."_". $name;
            }

            $file->move("source/image/product/",$image);
                
            $type_products->image = $image;
         }
          
         $type_products->save();
         return redirect('admin/producttype/sua/'.$id)->with('thongbao','Sửa Thành Công !!!');
    }

    public function getXoa($id)
    {
        $type_products = ProductType::find($id);
        $type_products->delete();

        return redirect('admin/producttype/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
