<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    //
    public function getDanhSach()
    {
    	$slide = Slide::all();
    	return view('admin.slide.danhsach',['slide'=>$slide]);
    }

    public function getThem()
    {
      
     $slide = Slide::all();
     return view('admin.slide.them',['slide'=>$slide]);

    }

    public function postThem(Request $request)
    {
            // Hàm validate để check các đk
        $this->validate($request,
            [
                 
                'link' => 'required',
               
            ],
            [
                 
                'link.required' => 'Bạn chưa nhập đường Link',
                
            ]);

        $slide = new Slide;
        
        $slide->link = $request->link;
        $slide->image = $request->image;

        $slide->save();

         return redirect('admin/slide/them')->with('thongbao','Thêm Thành Công !!!');

    }
    public function getSua($id)
    {
      
      $slide = Slide::find($id);
        return view('admin.slide.sua',['slide'=>$slide]);
         
    }

    public function postSua(Request $request,$id)
    {
          $this->validate($request,
            [
                'link' => 'required',
                
                
            ],
            [
                'link.requires' => 'Bạn chưa nhập đường link',
                 
                 
            ]);
         $slide = Slide::find($id);
         $slide->link = $request->link;
         
         if($request->hasFile('image'))
         {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' &&  $duoi != 'png' && $duoi != 'jpeg')
              {
                return redirect('admin/slide/sua')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');

              }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_". $name;
            while (file_exists("source/image/slide/".$image))
            {
                $image = str_random(4)."_". $name;
            }

            $file->move("source/image/slide/",$image);
                
            $slide->image = $image;
         }
          
         $slide->save();
         return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa Thành Công !!!');
    }

    public function getXoa($id)
    {
        $slide = Slide::find($id);
        $slide->delete();

        return redirect('admin/slide/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
