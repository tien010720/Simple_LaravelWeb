<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use App\Comment;

class ProductController extends Controller
{
    //
    public function getDanhSach()
    {
    	$products = Product::all();
    	return view('admin.product.danhsach',['products'=>$products]);
    }

    public function getThem()
    {
      
     $products = Product::all();
     $type_products = ProductType::all();
        return view('admin.product.them',['products'=>$products,'type_products'=>$type_products]);
    }

    public function postThem(Request $request)
    {
            // Hàm validate để check các đk
        $this->validate($request,
            [
                'name'=>'required|min:3|unique:products,name',
                'description' => 'required',
                'unit_price' => 'required',
                    
            ],
            [
                'name.required'=>'Bạn chưa nhập tên',
                'name.min'=>'Tên phải có ít nhất 3 ký tự',
                'name.unique'=>'Tên đã tồn tại',
                'description.required' => 'Bạn chưa nhập miêu tả',
                'unit_price.requires' => 'Bạn chưa nhập giá'
                 
                 
            ]);

        $products = new Product;
        $type_products = new ProductType;
        $products->name = $request->name;
        $products->id_type = $request->ProductType;
        $products->description = $request->description;
        $products->unit_price = $request->unit_price;
        $products->promotion_price = $request->promotion_price;
        $products->image = $request->image;
        $products->unit = $request->unit;
        $products->new = $request->new;
        $products->save();
        
         return redirect('admin/product/them')->with('thongbao','Thêm Thành Công !!!');

    }
    public function getSua($id)
    {
      $type_products = ProductType::all();
      $products = Product::find($id);
        return view('admin.product.sua',['products'=>$products,'type_products'=>$type_products]);
         
    }

    public function postSua(Request $request,$id)
    {
          $this->validate($request,
            [
                'name' => 'required',
                
                
            ],
            [
                'name.requires' => 'Bạn chưa nhập tên khách hàng',
                    
            ]);
        
        $type_products = ProductType::all();  
        $products = Product::find($id);
        $products->name = $request->name;
        $products->id_type = $request->ProductType;
        $products->description = $request->description;
        $products->unit_price = $request->unit_price;
        $products->promotion_price = $request->promotion_price;
     
        
         
      if($request->hasFile('image'))
         {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' &&  $duoi != 'png' && $duoi != 'jpeg')
              {
                return redirect('admin/product/sua')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');

              }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_". $name;
            while (file_exists("source/image/product/".$image))
            {
                $image = str_random(4)."_". $name;
            }

            $file->move("source/image/product/",$image);
                
            $products->image = $image;
         }

         $products->save();
         return redirect('admin/product/sua/'.$id)->with('thongbao','Sửa Thành Công !!!');
    }

    public function getXoa($id)
    {
        $products = Product::find($id);
        $products->delete();

        return redirect('admin/product/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
