
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Login | SIMLAB</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="{{ asset('img/logo-square.jpg') }}" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Masuk</h1>
							<form method="POST" action="{{ route('login') }}">
                @csrf
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email" :value="__('Email')">Email</label>
									<input id="email" type="email" class="form-control" name="email" :value="old('email')" required autofocus autocomplete="username">
									<div class="invalid-feedback">
										Email Salah
									</div>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password" :value="__('Password')">Kata Sandi</label>
                    @if (Route::has('password.request'))
                      <a href="{{ route('password.request') }}" class="float-end">
                        Lupa Kata Sandi?
                      </a>
                    @endif
									</div>
									<input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
								    <div class="invalid-feedback">
								    	Kata Sandi dibutuhkan
							    	</div>
								</div>

								<div class="d-flex align-items-center">
									<div class="form-check">
										<input type="checkbox" name="remember" id="remember_me" class="form-check-input">
										<label for="remember_me" class="form-check-label">Ingat Saya</label>
									</div>
									<button type="submit" id ="btn-login" class="btn btn-primary ms-auto">
										Masuk
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
              @if (Route::has('register'))
								Belum Membuat Akun? <a href="{{ route('register') }}" class="text-dark">Buat disini</a>
              @endif
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2024 &mdash; SIMLAB
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/login.js"></script>
</body>
</html>
