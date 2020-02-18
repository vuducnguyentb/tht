@section('after_css')
    <link rel="stylesheet" href="{{asset_theme ('css/homeindex.css')}}" type="text/css"/>
@endsection
<section class="pdt fadeIn ptb ptb-sm-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 center-col margin-50px-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center">
                <h2 class="intro">{{__('Subcriber')}}</h2>
                <p class="width-50 sm-width-75 xs-width-95 center-col fadeInUp intro-contact">
                    {{__('SIGN UP TO RECEIVE PROMOTION NEWS, HOT PRODUCTS THROUGH EMAIL')}}
                    <br>
                    {{__('Receive promotional information, discounts, birthday gifts or super hot products from THT Vietnam')}}
                </p>
            </div>
        </div>
        <div class="text-center">
            <form id="smart" method="POST" action="{!! route('addSubEn') !!}">
                {{csrf_field()}}
                <input class="email_input dark" required name="email" id="email" placeholder="E-mail" type="email">
                <input class="email_input dark" required name="name" id="name" placeholder="{{__('Name')}}" type="text">
                <div class="row text-center pt-30">
                    <div class="col-xs-12">
                        <button id="form" class="btn btn-md btn-black ">{{__('Subcriber')}}</button>
                    </div>
                </div>
                <p class=""></p>
            </form>

        </div>
    </div>
</section>
@section('after_js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.easing@1.3.0/jquery.easing.1.3.js" type="text/javascript"></script>
    <script src="{{asset_theme ('js/revolution-custom.js')}} " type="text/javascript"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $("#smart").validate({
            rules: {
                email:
                    {
                        required: true,
                        email: true,
                    },
                name: {
                    required: true
                }
            },
            messages:
                {
                    email:
                        {
                            required: "Please enter your email",
                            email: "Email format is incorrect ",

                        },
                    name:
                        {
                            required: "Please enter your name"
                        },
                },
        });

        $("#form").click(function(event){
            var CSRF_TOKEN = $('meta[name=csrf_token]').attr('content');
            if(!$("#smart").valid()) {
                return;
            }
            event.preventDefault();
            var email = $("#email").val();
            var name = $("#name").val();
            var obj = {
                email: email,
                name:name,
                _token: CSRF_TOKEN
            };
            $.ajax({
                url: $('#smart').attr('action'),
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
                        text: "Thank you for leaving the information!",
                        icon: "success",
                    });
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal({
                        title: "Error",
                        text: "Please try again" ,
                        icon: "error",
                    });
                }
            });
        });
    </script>
@endsection

