<?php

namespace App\Http\Controllers;

use App\Models\CouponModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();


class CouponController extends Controller
{
    public function unset_coupon()
    {
        unset($_SESSION['coupon']);
        return redirect()->back()->with('message', 'Xóa mã khuyến mãi thành công');
    }
    public function insert_coupon()
    {
        return view('admin.coupon.add-coupon');
    }
    public function delete_coupon($coupon_id)
    {
        $coupon = CouponModel::find($coupon_id);
        $coupon->delete();
        Session::put('message', 'Xóa mã giảm giá thành công');
        return Redirect::to('list-coupon');
    }
    public function list_coupon()
    {
        $coupon = CouponModel::orderby('coupon_id', 'DESC')->get();
        return view('admin.coupon.list-coupon')->with(compact('coupon'));
    }
    public function insert_coupon_code(Request $request)
    {
        $data = $request->all();

        $coupon = new CouponModel;

        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_time = $data['coupon_time'];
        $coupon->coupon_condition = 1;
        $coupon->save();

        Session::put('message', 'Thêm mã giảm giá thành công');
        return Redirect::to('/list-coupon');
    }
}
