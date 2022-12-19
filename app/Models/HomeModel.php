<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class HomeModel extends Model
{
    use HasFactory;
    public static function Getcategory(){

        $cate_product = DB::select('SELECT C.category_id, C.category_name, C.category_image, C.category_status, COUNT(P.product_id) as quantity FROM tbl_category_product as C, tbl_product as P WHERE P.category_id= C.category_id GROUP BY C.category_id, C.category_name, C.category_image, C.category_status ');
        // $cate_product = DB::table('tbl_category_product')->orderBy('category_id','asc')->get();
        return $cate_product;
    }
    public static function Getbrand(){
        $brand_product = DB::select('SELECT B.brand_id, B.brand_name, B.brand_image, B.brand_status, COUNT(P.product_id) as quantity FROM tbl_brand_product as B, tbl_product as P WHERE P.category_id= B.brand_id GROUP BY B.brand_id, B.brand_name, B.brand_image, B.brand_status ');
        // $brand_product = DB::table('tbl_brand_product')->orderBy('brand_id','asc')->get();
        return $brand_product;
    }
    public function Show_all_product(){
        $all_product = DB::table('tbl_product')->where('product_status','1')->inRandomOrder()->orderBy('product_id','desc')-> paginate(8);
        return $all_product;
    }
    public function Show_shop_product(){
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderBy('product_id','desc')->get();
        return $all_product;
    }
    public function Search_product($keyword){
        $all_product = DB::table('tbl_product')->where('product_name','like','%'.$keyword.'%')->get();
        return $all_product;
    }
    public function show_monitor(){
       $monitor = DB::table('tbl_product')  ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('tbl_category_product.category_id','8')->inRandomOrder()->paginate(3);
        return $monitor;
    }
    public function show_laptop(){
        $laptop = DB::table('tbl_product')  ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
         ->where('tbl_category_product.category_id','3')->inRandomOrder()->paginate(4);
         return $laptop;
     }
     public function show_keyboard(){
        $keyboard = DB::table('tbl_product')  ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
         ->where('tbl_category_product.category_id','4')->inRandomOrder()->paginate(4);
         return $keyboard;
     }

}
