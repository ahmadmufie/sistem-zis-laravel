<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login ZIS App</title>
    
    <!-- Fonts: Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #059669; /* Emerald 600 */
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow: hidden; /* Hilangkan scrollbar */
        }
        .login-container {
            min-height: 100vh;
        }
        
        /* Bagian Kiri: Gambar */
        .left-side {
            background: url('https://images.unsplash.com/photo-1564121211835-e88c852648ab?q=80&w=2070&auto=format&fit=crop') no-repeat center center;
            background-size: cover;
            position: relative;
        }
        .left-side::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(180deg, rgba(5, 150, 105, 0.4) 0%, rgba(6, 78, 59, 0.8) 100%);
        }
        .left-content {
            position: relative;
            z-index: 2;
            color: white;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 3rem;
        }

        /* Bagian Kanan: Form */
        .right-side {
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-form-box {
            width: 100%;
            max-width: 420px;
            padding: 2rem;
        }

        /* Form Styling */
        .form-floating > .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
        }
        .form-floating > .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(5, 150, 105, 0.1);
        }
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 14px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background-color: #047857;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(5, 150, 105, 0.4);
        }

        .brand-logo {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 2rem;
            display: inline-block;
        }
    </style>
</head>
<body>

    <div class="row g-0 login-container">
        <!-- Kolom Kiri (Gambar & Quote) - Hilang di HP -->
        <div class="col-lg-7 d-none d-lg-block left-side">
            <div class="left-content">
                <div>
                    <!-- Logo kecil di pojok kiri atas gambar -->
                    <div class="fw-bold fs-4"><i class="fas fa-kaaba me-2"></i>ZIS App</div>
                </div>
                <div class="mb-5">
                    <h1 class="display-4 fw-bold mb-3">Amanah Umat,<br>Tanggung Jawab Kita.</h1>
                    <p class="fs-5 opacity-75">"Dan dirikanlah shalat, tunaikanlah zakat dan ruku'lah beserta orang-orang yang ruku'." <br> (QS. Al-Baqarah: 43)</p>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan (Form Login) -->
        <div class="col-lg-5 right-side">
            <div class="login-form-box">
                
                <div class="mb-5">
                    <div class="brand-logo"><i class="fas fa-mosque me-2"></i>ZIS Login</div>
                    <h3 class="fw-bold text-dark">Selamat Datang Kembali! 👋</h3>
                    <p class="text-muted">Silakan masukkan akun Amil atau Admin Anda.</p>
                </div>

                <!-- Alert Error -->
                @if ($errors->any())
                    <div class="alert alert-danger border-0 d-flex align-items-center mb-4" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <div>Email atau password salah.</div>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="email">Email Address</label>
                    </div>
                    
                    <div class="form-floating mb-4">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember">
                            <label class="form-check-label text-muted small" for="remember">
                                Ingat Saya
                            </label>
                        </div>
                        <a href="#" class="text-decoration-none small fw-bold text-muted">Lupa Password?</a>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            Masuk Aplikasi <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </form>

                <div class="mt-5 text-center text-muted small">
                    &copy; {{ date('Y') }} Sistem Informasi ZIS. All rights reserved.
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>