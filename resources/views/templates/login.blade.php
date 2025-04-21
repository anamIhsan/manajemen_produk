<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Toko - Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f8f9fa;
    }
    .login-container {
      max-width: 400px;
      margin: 100px auto;
      padding: 30px;
      background-color: #ffffff;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="login-container">
      <h2 class="text-center mb-4">Login</h2>
      @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                <b>Success!</b> : {{session('success')}}
            </div>
        @endif
      <form action="{{route('auth.login')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email" required />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password" required />
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
      <div class="text-center mt-3">
        <small>Belum punya akun? <a href="#">Daftar di sini</a></small>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (Opsional, jika pakai komponen interaktif) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
