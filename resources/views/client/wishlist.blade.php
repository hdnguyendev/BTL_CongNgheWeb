@extends('layout.homelayout')
@section('content')
    <section class="special-offer section">
        <div class="container">
            <div class="row">
                <div class="col-12 pt-10">
                    <div class="section-title" style="  background-image: url(upload/productImage/line.jpg);">
                        <h2>SẢN PHẨM YÊU THÍCH</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="row_wishlist">

                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        function view() {
            if (localStorage.getItem('data')) {
                var data = JSON.parse(localStorage.getItem('data'));
                data.reverse();
                document.getElementById('row_wishlist').style.display = 'flex';
                document.getElementById('row_wishlist').style.flexFlow = 'row wrap';
                document.getElementById('row_wishlist').style.justifyContent = 'flex-start';
                var check = true;
                for (var i = 0; i < data.length; i++) {
                    var name = data[i].name;
                    var price = data[i].price;
                    var image = data[i].image;
                    var url = data[i].url;
                    check == false
                    $('#row_wishlist').append(
                        ' <div class="w-25" > <div class="single-product style="min-height:500px;"><div class="product-image"> <img src="' +
                        image + '" alt="#"> <div class="button"> <a href="' + url +
                        '" class="btn"><i class="lni lni-cart"></i> Mua ngay</a> </div> </div> <div class="product-info"> <span class="category">Còn hàng</span> <h5 style="min-height:100px;"class="title" > <a href="' +
                        url + '"></a>' + name + ' </h5> <div class="price"> <span>' + price +
                        'vnđ</span> </div> </div></div></div></div> ')

                }
                if (check){
                    document.getElementById('row_wishlist').style = '';
                    $('#row_wishlist').html("<h5 class='text-center'>HIỆN TẠI BẠN CHƯA CÓ SẢN PHẨM YÊU THÍCH NÀO! 😥</h5>");

                }

            }
        }

        view();
    </script>
@endsection
