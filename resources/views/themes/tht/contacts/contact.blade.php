@extends('themes.tht.layouts.main')
@section('seo_support')
    <title>  {{get_site_setting('contact-title')}}</title>
    <meta name="description" content="{{get_site_setting('contact-description')}}">
    <meta name="keywords" content="{{get_site_setting('contact-keyword')}}">
    <meta property="og:title" content="{{get_site_setting('contact-title')}}">
    <meta property="og:description" content="{{get_site_setting('contact-description')}}">
    <meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
    <meta property="og:url" content="{{route('contact')}}">
    <meta name="twitter:title" content="{{get_site_setting('contact-title')}}">
    <meta name="twitter:description" content="{{get_site_setting('contact-description')}}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="{{asset_theme ('img/logo.png')}}">
@endsection
@section('after_css')
<link rel="stylesheet" href="{{asset_theme ('css/contact.css') }}">
@endsection
@section('content')
    <!-- Intro Section -->
    <section class="inner-intro overlay-dark bg-img8 light-color">
        <div class="container">
            <div class="row title">
                <h2 class="h2">Liên hệ</h2>
                <div class="page-breadcrumb">
                    <a href="{{route('home')}}">Trang chủ</a>/<span>Liên hệ với chúng tôi</span>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- End Intro Section -->
    <div class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_vertical_style" style="right:0px; top:100px;">
        <a href="https://www.facebook.com/" class="a2a_button_facebook"></a>
        <a class="a2a_button_twitter"></a>
        <a class="a2a_button_pinterest"></a>
        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
    </div>
    <!-- Contact Section -->
    <section class="pt-80 ptb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center intro">
                    <h2>Liên hệ</h2>
                    <p class="lead">
                        Liên hệ với chúng tôi để có thông tin, ưu đãi và giá tốt nhất về sản phẩm
                    </p>
                </div>
            </div>
            <div class="spacer-75"></div>
            <div class="row">
                <div class="col-sm-7 mb-45">
                    <h4> Vui lòng để lại thông tin</h4>
                    <p>
                        {{-- - When an unknown printer took a galley. --}}
                    </p>
                    <div id="success">
                        <div role="alert" class="alert alert-success">
                            Cảm ơn bạn đã liên hệ.
                        </div>
                    </div>
                    <!--  <form class="contact-form" id="contact-form" role="form"> -->
                    <form id="contact-form" method="POST">
                        {{csrf_field()}}
                        <div class="form-field-wrapper">
                            <input id="full_name" class="name input-sm form-full" required type="text" name="full_name" placeholder="Họ tên*">
                        </div>
                        <div class="form-field-wrapper">
                            <input id="mail-contact" class="email input-sm form-full" required type="email" name="mail_contact" placeholder="Email*">
                        </div>
                        <div class="form-field-wrapper">
                            <input id="phone" class="sub input-sm form-full" required type="number" name="phone" placeholder="Số điện thoại*">
                        </div>
                        <div class="form-field-wrapper">
                            <textarea id="body" class="message form-full" required name="body" placeholder="Nội dung:"></textarea>
                        </div>
                        <button class="btn btn-md btn-black form-full" id="form-group-bt"
                        >
                            Gửi
                        </button>

                    </form>
                    <!-- END Contact FORM -->
                </div>
                <div class="col-sm-4 col-sm-offset-1 contact">

                    <div class="contact-box-left mtb-30 ">
                            <h4>Chi tiết</h4>

                        <div class="contact-icon-left">
                            <i class="ion ion-ios-location"></i>
                        </div>
                        <h6>
                            Địa chỉ
                        </h6>
                        <p>
                            {!!strip_tags(\App\Helpers\Base::getSetting('dia-chi'))!!}
                            <br />
                        </p>
                        <a class="info-customer" href="mailto:{!!strip_tags(\App\Helpers\Base::getSetting('email'))!!}"><i class="fa fa-envelope-o left"></i>{!!strip_tags(\App\Helpers\Base::getSetting('email'))!!}</a>
                        <br />
                        <a class="info-customer" href="tel:{!!strip_tags(\App\Helpers\Base::getSetting('phone'))!!}"><i class="fa fa-phone left"></i>{!!strip_tags(\App\Helpers\Base::getSetting('phone'))!!}</a>
                    </div>
                    <div class="contact-box-left mb-45">
                        <div class="contact-icon-left">
                            <i class="ion ion-ios-location"></i>
                        </div>
                        <h6>Văn phòng đại diện</h6>
                        <p>
                            {!!strip_tags(\App\Helpers\Base::getSetting('representative-office'))!!}
                        </p>
                        <p style=" font-size: 12px;">
                            <a style="color: blue; text-decoration: underline;" target="_blank" href="{!!strip_tags(\App\Helpers\Base::getSetting('share-map'))!!}">
                               Tìm chúng tôi trên bản đồ</a></p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="maps">
    <div class="maps-contact">
        {!!strip_tags(\App\Helpers\Base::getSetting('map'),'<p><br><img><ul><li><table><quote><em><strong><iframe>')!!}
    </div>
    </section>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="mess">
                    Cảm ơn bạn đã để lại thông tin
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    @include('themes.tht.sections.partner')
@endsection
@section('after_js')
<script src="{{asset_theme ('js/page.js')}}" type="text/javascript"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
{{--<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>--}}
<script>
    $(document).ready(function(){
        $("#contact-form").validate({
            rules: {
                full_name: "required",
                mail_contact: "required",
            },
            messages: {
                full_name: "Vui lòng nhập tên của bạn",
                mail_contact: "Bạn phải nhập đúng định dạng Email. VD:abc@gmail.com",
                phone: "Nhập  số điện thoại.Ví dụ : 012345678",
                body:"Vui lòng nhập nội dung"
            }
        });

        $("#form-group-bt").click(function(event){
            var CSRF_TOKEN = $('meta[name=csrf_token]').attr('content');

            if(!$("#contact-form").valid()) {

                return;
            }
            event.preventDefault();
            var full_name = $("#full_name").val();
            var email = $("#mail-contact").val();
            var phone = $("#phone").val();

            var body = $("#body").val();


            var obj = {
                full_name : full_name,
                email: email,
                phone: phone,

                body:body,
                _token: CSRF_TOKEN
            };
            $.ajax({
                /* the route pointing to the post function */
                url: '{!! route('addcontact') !!}',
                type: 'POST',
                data: obj,
                dataType: 'JSON',
                success: function ({errors}) {
                    if(errors) {
                        for(let i in errors) {
                            return swal({
                                title: "Lỗi",
                                text: errors[i].join(','),
                                icon: "error",
                            })
                        }

                    }
                    swal({
                        title: "Hoàn thành",
                        text: "Cám ơn bạn đã liên hệ với chúng tôi !",
                        icon: "success",
                    });
                },

                error: function (xhr, ajaxOptions, thrownError) {
                    if(xhr.status == 422){
                        swal({
                            title: "Lỗi",
                            text: thrownError,
                            icon: "error",
                        });
                    }
                }
            });
        });
    });
</script>
@stop
