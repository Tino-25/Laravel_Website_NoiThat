<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="{{asset('./web/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('./web/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('./web/css/cuahang.css')}}">
    <link rel="stylesheet" href="{{asset('./web/css/chitietsp.css')}}">
    <link rel="stylesheet" href="{{asset('./web/css/cart.css')}}">
    <link rel="stylesheet" href="{{asset('./web/css/pay.css')}}">
    <!-- themify icons -->
    <link rel="stylesheet" href="./assets/themify-icons/themify-icons.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Ckeditor -->
    <script type="text/javascript" src="{{asset('./ckeditor/ckeditor.js')}}"></script>
    
    <title>Gia Phát</title>
</head>

<body>
    <div id="main_home">
        
        @include('elements.header')

        <div id="body">
            @yield('content')
        </div>
        

        @include('elements.footer')

    </div>
    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <!-- javascript -->
    <script src="{{asset('./web/js/main.js')}}"></script>
</body>

</html>