<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\CheckoutModel;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

session_start();

class LoginController extends Controller
{
    public function login_client(Request $request)
    {
        $cate_product = CategoryModel::Getcategory();
        $brand_product = BrandModel::Getbrand();
        $url_canonical = $request->url();
        return view('client.login.login')->with('brand', $brand_product)->with('category', $cate_product)->with('url_canonical', $url_canonical);
    }
    public function register_client(Request $request)
    {
        $cate_product = CategoryModel::Getcategory();
        $brand_product = BrandModel::Getbrand();
        $url_canonical = $request->url();
        return view('client.login.register')->with('brand', $brand_product)->with('category', $cate_product)->with('url_canonical', $url_canonical);
    }
    public function add_customer(Request $request)
    {


        $validator = Validator::make($request->all(),   [
            'c_name' =>'required|min:5',
            'c_email'=>'required|unique:tbl_customer,customer_email',
            'c_sdt'=>'required|numeric',
            'c_password'=>'required|confirmed|min:6',

        ], [
            'c_name.required' => 'Họ và tên tài khoản bắt buộc ',
            'c_name.min' => 'Tên tài khoản không dưới 5 ký tự ',
            'c_email.required' => 'Email bắt buộc ',
            'c_email.unique' => 'Email này đã tồn tại',
            'c_sdt.required' => 'Số điện thoại bắt buộc ',
            'c_sdt.numeric' => 'Số điện thoại bắt buộc là số ',
            'c_password.required' => 'Mật khẩu bắt buộc ',
            'c_password.comfirmed'=> 'Mật khẩu xác nhận không chính xác',
            'c_password.min'=>'Mật khẩu không được ít hơn 6 ký tự',
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput();
        } else {
            $data = array();
            $data['customer_name'] = $request->c_name;
            $data['customer_email'] = $request->c_email;
            $data['customer_password'] = md5($request->c_password);
            $data['customer_phone'] = $request->c_sdt;
            $insert_customer = CheckoutModel::Insert_Customer($data);
            Session::put('customer_id', $request->customer_id);
            Session::put('customer_name', $request->customer_name);
            return redirect('/login-client')->with('message_success', "Đăng kí thành công!")->with('email_register', $data['customer_email']);
        }


    }
    public function view_profile(Request $request, $customer_id)
    {
        $url_canonical = $request->url();
        $data_customer = Customer::where('customer_id', $customer_id)->first();
        $cate_product = CategoryModel::Getcategory();
        $brand_product = BrandModel::Getbrand();
        return view('client.profile-client.view-profile')->with('brand', $brand_product)->with('category', $cate_product)->with('url_canonical', $url_canonical)->with('data_customer', $data_customer);
    }

    public function logout_client()
    {
        Session::flush();
        return Redirect::to('/');
    }
    public function login_customer(Request $request)
    {
        $email = $request->email_acc;
        $password = md5($request->pass_acc);
        $result = CheckoutModel::Seclect_Customer($email, $password);
        if ($result) {
            Session::put('customer_id', $result->customer_id);
            Session::put('customer_name', $result->customer_name);
            Session::put('customer_email', $result->customer_email);
            Session::put('customer_phone', $result->customer_phone);
            Session::put('customer_address', $result->customer_address);
            Session::put('customer_image', $result->customer_image);

            return Redirect::to('/gio-hang');
        } else {
            return Redirect::back()->with('message', 'Tài khoản hoặc mật khẩu không đúng, vui lòng thử lại!')->withInput();
        }
    }
    public function update_infor_client(Request $request, $customer_id)
    {

        $client = Customer::find($customer_id);
        $data = array();
        $client->customer_name = $request->customer_name;
        $client->customer_email = $request->customer_email;
        $client->customer_phone = $request->customer_phone;
        $client->customer_address = $request->customer_address;
        if ($client->save($data)) {
            Session::put('customer_address', $request->customer_address);
            return redirect()->back()->with('msg', 'success');

        }
        return redirect()->back()->with('msg', 'fail');
    }
    public function update_avatar_client(Request $request, $customer_id)
    {
        $client = Customer::find($customer_id);
        $data = array();
        $get_img = $request->file('client_avatar');
        if ($get_img) {
            $get_name_image = $get_img->getClientOriginalName();
            $name_img = current(explode(',', $get_name_image));
            $new_image = $name_img;
            $get_img->move('upload/clientImage/', $new_image);
            $client->customer_image = $new_image;
            if ($client->save($data)) return redirect()->back()->with('msg', 'success');
            return redirect()->back()->with('msg', 'fail');
        }
    }
    public function update_password_client(Request $request, $customer_id)
    {
        $client = Customer::find($customer_id);
        $client->customer_password =  md5($request->customer_password);
        if ($client->save()) return redirect()->back()->with('msg', 'success');
        return redirect()->back()->with('msg', 'fail');
    }
}
