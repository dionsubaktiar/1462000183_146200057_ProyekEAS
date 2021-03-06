<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login|Sagicell</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
    <!-- Bootstrap core CSS -->
<link href="resources\css\signin.css" rel="stylesheet">
    <style>
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
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
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="resources\css\signin.css" rel="stylesheet">
  </head>
  <body class="text-center">

<main class="form-signin">
  <form action="/login" method="POST">
    @csrf
    <img class="img-center" src="{{asset('backend/dist/img/sagiri.png')}}" alt="" width="160" height="200">
    <h1 class="h3 mb-3 fw-normal">Login dulu mas~</h1>

    <div class="form-floating">
      <input type="text" class="form-control" @error('email') is-invalid
          @enderror id="email" name="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
      <label for="email">Emailmu oni-chan</label>
      @error('email')
          <div class="invalid-feedback">{{ 'Emailnya salah, baka!' }}</div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" @error('password') is-invalid
      @enderror id="password" name="password" placeholder="Password">
      <label for="password">Passwordmu oni-chan</label>
      @error('password')
      <div class="invalid-feedback">{{ 'Passwordnya salah, baka!' }}</div>
      @enderror
    </div>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Gaakan dilupain ko:(
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
    <p class="mt-5 mb-3 text-muted"></p>
    <small class="d-block text-center mt-3">Belum daftar?<a href="/register">DAFTAR!</a></small>
  </form>
</main>
  </body>
</html>
