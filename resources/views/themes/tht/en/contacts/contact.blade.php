@extends('themes.tht.en.layouts.main')
@section('seo_support')
    <title>  {{get_site_setting('contact-title-en')}}</title>
    <meta name="description" content="{{get_site_setting('contact-description-en')}}">
    <meta name="keywords" content="{{get_site_setting('contact-keyword-en')}}">
    <meta property="og:title" content="{{get_site_setting('contact-title-en')}}">
    <meta property="og:description" content="{{get_site_setting('contact-description-en')}}">
    <meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
    <meta property="og:url" content="{{route('contactEn')}}">
    <meta name="twitter:title" content="{{get_site_setting('contact-title-en')}}">
    <meta name="twitter:description" content="{{get_site_setting('contact-description-en')}}">
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
                <h2 class="h2">{{__('Contact Us')}}</h2>
                <div class="page-breadcrumb">
                    <a href="{{route('homeEn')}}">{{__('Home')}}</a>/<span>{{__('Contact Us')}}</span>
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
                    <h2>
                        {{__('Contact')}}
                    </h2>
                    <p class="lead">
                        {{__('Contact us for information, offers and best prices on products')}}
                    </p>
                </div>
            </div>
            <div class="spacer-75"></div>
            <div class="row">
                <div class="col-sm-7 mb-45">
                    <h4>{{__('Please leave your information')}}</h4>
                    <p>
                        {{-- - When an unknown printer took a galley. --}}
                    </p>
                    <div id="success">
                        <div role="alert" class="alert alert-success">
                           {{__('Thank you for contact')}}
                        </div>
                    </div>
                    <!--  <form class="contact-form" id="contact-form" role="form"> -->
                    <form id="contact-form" method="POST">
                        {{csrf_field()}}
                        <div class="form-field-wrapper">
                            <input id="full_name" class="name input-sm form-full" required type="text" name="full_name" placeholder="{{__('Full name')}}*">
                        </div>
                        <div class="form-field-wrapper">
                            <input id="mail-contact" class="email input-sm form-full" required type="email" name="mail_contact" placeholder="{{__('Email')}}*">
                        </div>
                        <div class="form-field-wrapper">
                            <input id="phone" class="sub input-sm form-full" required type="number" name="phone" placeholder="{{__('Phone')}}*">
                        </div>
                        <div class="form-field-wrapper">
                            <textarea id="body" class="message form-full" required name="body" placeholder="{{__('Content')}}"></textarea>
                        </div>
                        <button class="btn btn-md btn-black form-full" id="form-group-bt"
                        >
                            {{__('Send')}}
                        </button>

                    </form>
                    <!-- END Contact FORM -->
                </div>
                <div class="col-sm-4 col-sm-offset-1 contact">

                    <div class="contact-box-left mtb-30 ">
                            <h4>{{__('Contact detail')}}</h4>

                        <div class="contact-icon-left">
                            <i class="ion ion-ios-location"></i>
                        </div>
                        <h6>
                            {{__('Address')}}
                        </h6>
                        <p>
                            {!!strip_tags(\App\Helpers\Base::getSetting('address'))!!}
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
                        <h6>{{__('Representative office')}}</h6>
                        <p>
                            {!!strip_tags(\App\Helpers\Base::getSetting('representative-office'))!!}
                        </p>
                        <p style=" font-size: 12px;">
                            <a style="color: blue; text-decoration: underline;" target="_blank" href="{!!strip_tags(\App\Helpers\Base::getSetting('share-map'))!!}">
                                {{__('Find us on the map')}}</a></p>
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
{{--                    <h4 class="modal-title">Modal Heading</h4>--}}
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="mess">
                    {{__('Thank you for leaving the information')}}
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('Close')}}</button>
                </div>

            </div>
        </div>
    </div>
    @include('themes.tht.en.sections.partner')
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
                full_name: "Please enter your name",
                mail_contact: "You must enter the correct format email. Ex:abc@gmail.com",
                phone: "Please enter your phone. Ex: 012345678",
                body:"Please enter content"
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
                url: '{!! route('addcontactEn') !!}',
                type: 'POST',
                data: obj,
                dataType: 'JSON',
                success: function ({errors}) {
                    if(errors) {
                        for(let i in errors) {
                            return swal({
                                title: "Error",
                                text: errors[i].join(','),
                                icon: "error",
                            })
                        }

                    }
                    swal({
                        title: "Complete",
                        text: "Thank you for contacting us !",
                        icon: "success",
                    });
                },

                error: function (xhr, ajaxOptions, thrownError) {
                    if(xhr.status == 422){
                        swal({
                            title: "Error",
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
