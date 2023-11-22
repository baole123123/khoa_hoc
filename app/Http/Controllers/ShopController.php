<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Course_Member;
use Illuminate\Support\Facades\Auth;


class ShopController extends Controller
{
    public function index(Request $request)
    {
        $items = Course::with('category')->where('status', 0);
        if (isset($request->keyword)) {
            $keyword = $request->keyword;
            $items->where('name', 'like', "%$keyword%");
        }
        $items = $items->paginate(8);
        return view('shop.home', compact('items'));
    }
    public function addToCart(Request $request)
    {
        $course = Course::find($request->input('id'));
        $date = Carbon::now();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $imageUrl = Storage::url($imagePath);
        } else {
            $imageUrl = null;
        }
        $carts = session()->get('cart', []);
        $existingItem = collect($carts)->where('course_id', $course->id)->first();
        if ($existingItem) {
            return response()->json(['exists' => true]);
        }
        $cartItem = [
            'course_id' => $course->id,
            'name' => $course->name,
            'quantity' => 1,
            'date' => $date,
            'amount' => $course->amount,
            'image' => $imageUrl,
        ];
        $carts[] = $cartItem;
        session()->put('cart', $carts);
        $cartItemCount = count($carts);
        return response()->json(['exists' => false, 'cartItemCount' => $cartItemCount]);
    }
    public function homeCart()
    {
        $course = Course::get();
        $carts = session()->get('cart', []);
        $param = [
            'cart' => $carts,
            'course' => $course
        ];
        return view('shop.cart', compact('param'));
    }
    public function cartDestroy($id)
    {
        $cart = session()->get('cart', []);
        $index = collect($cart)->search(function ($item) use ($id) {
            return $item['course_id'] == $id;
        });
        if ($index !== false) {
            unset($cart[$index]);
            session()->put('cart', $cart);
            return response()->json(['success' => 'Xóa khỏi giỏ hàng thành công']);
        } else {
            return response()->json(['error' => 'Không tìm thấy mục trong giỏ hàng'], 404);
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
    public function viewCheckout() {
        return view('shop.checkout');
    }
    public function checkout(Request $request) {
        if (Auth::guard('members')->check()) {
            $user = Auth::guard('members')->user();
            return response()->json(['logged_in' => $user]);
        } else {
            $response = [
                'message' => 'Bạn cần phải đăng nhập để tiếp tục.',
                'redirect' => route('login-shop')
            ];
            return response()->json($response);
        }
    }
    public function storeCheckout(Request $request) {
        $course_Member = new Course_Member();
        $carts = session()->get('cart', []);
        foreach ($carts as $cart) {
            $course_Member->courses_id = $cart['course_id'];
            $course_Member->date = $cart['date'];
            $course_Member->amount = $cart['amount'];
            $course_Member->member_id = Auth::guard('members')->user()->id;
            $cart['member_id'] = Auth::guard('members')->user()->id;
            $course_Member->save();
        }
        session()->forget('cart');
        return redirect()->route('shop.home')->with('successMessage','Thanh toán thành công');
    }
}
