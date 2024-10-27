<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Đăng nhập</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            
            background-image: url('{{ asset('images/banner/1727083097-fo9.jpg') }}');
        }

        .login-box {
         
            max-width: 700px;
            background: rgb(247, 245, 245);
            padding: 20px;
            border-radius: 17px;
            box-shadow: 0 0 40px rgba(239, 232, 31, 0.19);
        }

        .login-box h1 {
            font-weight: bold;
            color: #c91f1f;
            margin-bottom: 20px;
        }

        .login-box form {
            
            width: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-box input[type="text"],
        .login-box input[type="password"] {
            height: 30px;
            width: 250px;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-box button[type="submit"] {
            background: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-box button[type="submit"]:hover {
            background: #3e8e41;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-box">
            <h1 style="text-align: center;">ĐĂNG NHẬP</h1>
            <form action="{{ route('website.dologin') }}" method="post">
                @csrf
                <input type="text" id="username" class="form-control" placeholder="Tên đăng nhập hoặc email"
                    name="username">
                <input type="password" id="password" class="form-control" placeholder="Mật khẩu" name="password">
                <button type="submit" class="btn btn-success"> Đăng nhập</button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI610V8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd +nq25CkR6760+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('message'))
        <script>
            toastr.options = {
                "processBar": true,
                "closeButton": true
            }
            toastr.error("{{ Session::get('message') }}");
        </script>
    @endif
</body>

</html>
