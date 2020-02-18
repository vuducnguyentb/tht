<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <title>Document</title>
</head>
<body>
    <form id="smart"  method="POST" >
        {{csrf_field()}}
        <input class="email_input dark" required name="email" id="email" placeholder="E-mail"  type="email">
        <input class=" dark" required name="name" id="name" placeholder="Tên"  >
        <button id="form" class="input_submit dark"  >{{__('Send')}}</button>
        <p class=""></p>
      </form>
</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- jq -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function(){
              $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            $("#smart").validate({
                rules: {
                    name: "required",
                    email: "required",
                },
                messages: {
                    name: "Please enter your name",
                    email: "You must enter the correct format email.",
                }
            });

            $("#smart").click(function(event){
                var CSRF_TOKEN = $('meta[name=csrf_token]').attr('content');
                if(!$("#smart").valid()) {
                    return;
                }
                event.preventDefault();
                var name = $("#name").val();
                var email = $("#email").val();
                var obj = {
                    email: email,
                    name: name,
                    _token: CSRF_TOKEN
                };
                $.ajax({
                    url: '{!! route('addSubEn') !!}',
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
</html>
