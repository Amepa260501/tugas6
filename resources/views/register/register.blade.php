<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            align-items: center;
            padding-top: 33px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>

</head>

<body>
    <main class="form-signin">
        <form action="" method="post">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Registration</h1>

            <div class="form-floating">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="name" value="{{ old('name') }}" required>
                <label for="floatingInput">Name</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="floatingInput" placeholder="alamat" value="{{ old('alamat') }}" required>
                <label for="floatingInput">Alamat</label>
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror" id="floatingInput" placeholder="telepon" value="{{ old('telepon') }}" required>
                <label for="floatingInput">Telepon</label>
                @error('telepon')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <label>Jenis Kelamin</label>
                <div class="form-check @error('jenis_kelamin') is-invalid @enderror">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1" value="L">
                    <label class="form-check-label" for="flexRadioDefault1">L</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault2" value="P">
                    <label class="form-check-label" for="flexRadioDefault2">P</label>
                </div>
                @error('jenis_kelamin')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}" required>
                <label for="floatingInput">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" name="register" class="w-100 btn btn-lg btn-primary">Register</button>
        </form>
        <small class="d-block text-center mt-3">Have already account? <a href="{{ url('/login') }}">Login
                Now!</a></small>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
