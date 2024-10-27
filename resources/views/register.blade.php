<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Đăng Ký</title>
    <style>
        body {
            background-image: url('{{ asset('images/banner/1727083097-fo9.jpg') }}');
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .registration-box {
            max-width: 400px;
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .registration-box h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        .registration-box button {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="registration-box">
        <h1>Đăng Ký</h1>
        <form method="POST" action="{{ route('website.doRegister') }}"
            style="margin: 0; padding: 0; width:300px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); background-image: url('background-image.jpg'); background-size: cover; padding: 20px; border-radius: 10px;">
            @csrf
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="name" style="display: block; margin-bottom: 10px;">Họ và Tên</label>
                <input type="text" id="name" name="name" class="form-control" required style="width: 100%;">
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="username" style="display: block; margin-bottom: 10px;">Tên Đăng Nhập</label>
                <input type="text" id="username" name="username" class="form-control" required style="width: 100%;">
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="email" style="display: block; margin-bottom: 5px;">Email</label>
                <input type="email" id="email" name="email" class="form-control" required style="width: 100%;">
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="password" style="display: block; margin-bottom: 5px;">Mật Khẩu</label>
                <input type="password" id="password" name="password" class="form-control" required
                    style="width: 100%;">
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 20px;">Đăng Ký</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI610V8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR6760+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (Session::has('message'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true
            }
            toastr.error("{{ Session::get('message') }}");
        </script>
    @endif
</body>

</html>
