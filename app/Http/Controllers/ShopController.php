<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;

class ShopController extends Controller
{
    public function index(Request $request)
    {

        $items = Course::with('category')->where('status' , 0)->paginate(8);
        if (isset($request->keyword)) {
            $keyword = $request->keyword;
            $items = Course::where('name', 'like', "%$keyword%")
                ->paginate();
        }

        return view('shop.home', compact('items'));

    }
    public function detail(string $id)
    {
        $items = Course::find($id);
        // Lấy các sản phẩm có liên quan (ví dụ: cùng danh mục)
        $relatedProducts = Course::where('category_id', $items->category_id)
            ->where('id', '<>', $items->id) // Loại bỏ sản phẩm hiện tại
            ->inRandomOrder() // Sắp xếp ngẫu nhiên
            ->limit(2) // Giới hạn số lượng sản phẩm hiển thị
            ->get();
        return view('shop.detail', compact('items', 'relatedProducts'));
    }
    public function show($id)
    {
        $items = Course::find($id);
        return view('shop.show', compact('items'));
    }
}
