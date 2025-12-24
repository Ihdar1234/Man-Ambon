<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Register | MAN Ambon</title>

  {{-- Tailwind & DaisyUI --}}
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap');

    body {
      font-family: 'Montserrat', sans-serif;
      background: linear-gradient(135deg, #3b82f6, #10b981);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      padding: 16px;
    }

    .container {
      background: #ffffff;
      border-radius: 1.5rem;
      box-shadow: 0 15px 30px rgba(0,0,0,0.15);
      overflow: hidden;
      position: relative;
      width: 900px;
      max-width: 100%;
      min-height: 550px;
      transition: all 0.6s ease-in-out;
    }

    form {
      background-color: #ffffff;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 0 50px;
      height: 100%;
      text-align: center;
    }

    form input {
      background-color: #f9fafb;
      border: 1px solid #e5e7eb;
      padding: 12px 15px;
      width: 100%;
      border-radius: 0.5rem;
      margin: 8px 0;
      transition: all 0.3s ease;
    }

    form input:focus {
      border-color: #3b82f6;
      outline: none;
      box-shadow: 0 0 0 3px rgba(59,130,246,0.2);
    }

    form button {
      border-radius: 30px;
      padding: 12px 45px;
      background-color: #2563eb;
      color: #fff;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
      margin-top: 10px;
    }

    form button:hover {
      background-color: #1e40af;
      transform: translateY(-2px);
      box-shadow: 0 8px 15px rgba(37,99,235,0.3);
    }

    /* --- Panel Animasi --- */
    .form-container {
      position: absolute;
      top: 0;
      height: 100%;
      transition: all 0.6s ease-in-out;
      width: 50%;
    }

    .sign-in-container { left: 0; z-index: 2; }
    .sign-up-container { left: 0; opacity: 0; z-index: 1; }

    .container.right-panel-active .sign-in-container {
      transform: translateX(100%);
    }

    .container.right-panel-active .sign-up-container {
      transform: translateX(100%);
      opacity: 1;
      z-index: 5;
      animation: show 0.6s;
    }

    @keyframes show {
      0%,49.99% { opacity: 0; z-index: 1; }
      50%,100% { opacity: 1; z-index: 5; }
    }

    /* --- Overlay --- */
    .overlay-container {
      position: absolute;
      top: 0;
      left: 50%;
      width: 50%;
      height: 100%;
      overflow: hidden;
      transition: transform 0.6s ease-in-out;
      z-index: 100;
    }

    .container.right-panel-active .overlay-container {
      transform: translateX(-100%);
    }

    .overlay {
      background: linear-gradient(to right, #2563eb, #10b981);
      background-repeat: no-repeat;
      background-size: cover;
      color: #ffffff;
      position: relative;
      left: -100%;
      height: 100%;
      width: 200%;
      transform: translateX(0);
      transition: transform 0.6s ease-in-out;
    }

    .container.right-panel-active .overlay {
      transform: translateX(50%);
    }

    .overlay-panel {
      position: absolute;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 0 40px;
      text-align: center;
      top: 0;
      height: 100%;
      width: 50%;
      transition: transform 0.6s ease-in-out;
    }

    .overlay-left { transform: translateX(-20%); }
    .container.right-panel-active .overlay-left { transform: translateX(0); }
    .overlay-right { right: 0; }
    .container.right-panel-active .overlay-right { transform: translateX(20%); }

    /* --- Responsive --- */
    @media (max-width: 768px) {
      .container {
        width: 95%;
        min-height: 700px;
        border-radius: 1rem;
      }

      .overlay-container {
        display: none;
      }

      .form-container {
        position: absolute;
        width: 100%;
        transition: transform 0.6s ease-in-out, opacity 0.6s ease-in-out;
      }

      .sign-in-container,
      .sign-up-container {
        left: 0;
        width: 100%;
      }

      .sign-in-container {
        transform: translateY(0);
        opacity: 1;
        z-index: 2;
      }

      .sign-up-container {
        transform: translateY(100%);
        opacity: 0;
        z-index: 1;
      }

      .container.right-panel-active .sign-in-container {
        transform: translateY(-100%);
        opacity: 0;
      }

      .container.right-panel-active .sign-up-container {
        transform: translateY(0);
        opacity: 1;
        z-index: 5;
      }
    }
  </style>
</head>

<body>
  <div class="container" id="container">
    {{-- REGISTER --}}
    <div class="form-container sign-up-container">
      <form action="{{ route('register.siswa.post') }}" method="POST">
        @csrf
        <img src="{{ asset('storage/image/sejarah.jpg') }}" class="w-20 mb-3 rounded-full shadow-lg" alt="Logo MAN Ambon">
        <h1 class="text-2xl font-bold text-blue-600 mb-3">Daftar Akun Siswa</h1>
        <input type="text" name="name" placeholder="Nama Lengkap" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
        <button type="submit">Daftar</button>
        <p class="text-sm text-gray-500 mt-4">
          Sudah punya akun?
          <span id="toLogin" class="text-blue-600 hover:underline cursor-pointer">Login di sini</span>
        </p>
      </form>
    </div>

    {{-- LOGIN --}}
    <div class="form-container sign-in-container">
      <form action="{{ route('login.siswa.post') }}" method="POST">
        @csrf
        <img src="{{ asset('storage/image/sejarah.jpg') }}" class="w-20 mb-3 rounded-full shadow-lg" alt="Logo MAN Ambon">
        <h1 class="text-2xl font-bold text-green-600 mb-3">Login Siswa</h1>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <a href="#" class="text-sm text-blue-500 mt-2">Lupa password?</a>
        <button type="submit" class="mt-4">Masuk</button>
        <p class="text-sm text-gray-500 mt-4">
          Belum punya akun?
          <span id="toRegister" class="text-green-600 hover:underline cursor-pointer">Daftar sekarang</span>
        </p>
      </form>
    </div>

    {{-- OVERLAY --}}
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1 class="text-3xl font-bold mb-2">Selamat Datang Kembali!</h1>
          <p class="mb-4">Silakan login untuk melanjutkan ke akun Anda.</p>
          <button class="ghost btn btn-outline text-white border-white hover:bg-white hover:text-blue-700" id="signIn">Login</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1 class="text-3xl font-bold mb-2">Halo, Siswa Baru!</h1>
          <p class="mb-4">Daftar dan mulai perjalananmu bersama MAN Ambon.</p>
          <button class="ghost btn btn-outline text-white border-white hover:bg-white hover:text-green-700" id="signUp">Daftar</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    const container = document.getElementById('container');
    document.getElementById('signUp')?.addEventListener('click', () => container.classList.add('right-panel-active'));
    document.getElementById('signIn')?.addEventListener('click', () => container.classList.remove('right-panel-active'));
    document.getElementById('toLogin')?.addEventListener('click', () => container.classList.remove('right-panel-active'));
    document.getElementById('toRegister')?.addEventListener('click', () => container.classList.add('right-panel-active'));
  </script>
</body>
</html>
