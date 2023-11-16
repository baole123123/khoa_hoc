<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

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

        return view('shop.home',compact('items'));
    }

}
