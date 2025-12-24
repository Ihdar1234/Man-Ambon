<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.0.0/dist/full.css" rel="stylesheet">
  <style>
    /* Animasi masuk modal */
    .modal-enter {
      opacity: 0;
      transform: scale(0.95) translateY(-20px);
    }
    .modal-enter-active {
      transition: all 0.3s ease-out;
      opacity: 1;
      transform: scale(1) translateY(0);
    }

    /* Animasi keluar modal */
    .modal-leave {
      opacity: 1;
      transform: scale(1) translateY(0);
    }
    .modal-leave-active {
      transition: all 0.3s ease-in;
      opacity: 0;
      transform: scale(0.95) translateY(-20px);
    }

    /* Shake effect saat login gagal */
    .shake {
      animation: shake 0.3s ease-in-out;
    }
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      25% { transform: translateX(-5px); }
      50% { transform: translateX(5px); }
      75% { transform: translateX(-5px); }
    }

    /* Spinner animasi */
    .spinner {
      border: 3px solid rgba(255,255,255,0.3);
      border-top: 3px solid white;
      border-radius: 50%;
      width: 1.2rem;
      height: 1.2rem;
      animation: spin 1s linear infinite;
      display: inline-block;
      vertical-align: middle;
    }
    @keyframes spin {
      0% { transform: rotate(0deg);}
      100% { transform: rotate(360deg);}
    }
  </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 min-h-screen flex items-center justify-center">

  <div class="w-full max-w-md">
    <dialog id="login_modal" class="modal open">
      <div id="modalBox" class="modal-box relative bg-white/95 backdrop-blur-lg rounded-3xl shadow-2xl p-8 md:p-10 border border-gray-100 transform opacity-0 scale-95 translate-y-[-20px]">

        {{-- Tombol Close --}}
        <button id="closeBtn" class="btn btn-ghost btn-sm absolute right-4 top-4 text-gray-500 hover:text-gray-700 hover:bg-gray-100 transition rounded-full">
          ✖
        </button>

        {{-- Header --}}
        <div class="text-center mb-6">
          <h2 class="text-3xl md:text-4xl font-extrabold text-blue-700 flex items-center justify-center gap-2">
            🔑 Admin Login
          </h2>
          <p class="text-gray-500 text-sm md:text-base mt-2">
            Masukkan email dan password Anda untuk masuk ke dashboard
          </p>
        </div>

        {{-- Login Form --}}
        <form id="loginForm" method="POST" action="{{ route('login') }}" class="space-y-6">
          @csrf

          @if($errors->any())
            <div id="errorMsg" class="text-red-600 text-sm mb-4 text-center shake">
              {{ $errors->first() }}
            </div>
          @endif

          <div>
            <label class="label font-semibold text-gray-700">Email</label>
            <input type="email" name="email" required class="input input-bordered w-full focus:ring-2 focus:ring-blue-300 focus:border-transparent transition" placeholder="admin@example.com">
          </div>

          <div>
            <label class="label font-semibold text-gray-700">Password</label>
            <input type="password" name="password" required class="input input-bordered w-full focus:ring-2 focus:ring-blue-300 focus:border-transparent transition" placeholder="Password">
          </div>

          <div class="flex items-center justify-between text-sm">
            <label class="flex items-center gap-2">
              <input type="checkbox" name="remember" class="checkbox checkbox-sm">
              Remember me
            </label>
          </div>

          <div class="flex justify-end gap-4 mt-4">
            <button type="reset" class="btn btn-ghost text-gray-600 hover:bg-gray-100 transition rounded-lg">
              ❌ Batal
            </button>
            <button type="submit" id="loginBtn" class="btn btn-primary text-white shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 rounded-lg flex items-center justify-center gap-2">
              <span id="btnText">🔓 Login</span>
              <span id="btnSpinner" class="spinner hidden"></span>
            </button>
          </div>
        </form>

      </div>

      {{-- Backdrop --}}
      <form method="dialog" class="modal-backdrop bg-black/40 backdrop-blur-sm">
        <button>close</button>
      </form>
    </dialog>
  </div>

  <script>
    const modal = document.getElementById('login_modal');
    const modalBox = document.getElementById('modalBox');
    const closeBtn = document.getElementById('closeBtn');
    const loginForm = document.getElementById('loginForm');
    const loginBtn = document.getElementById('loginBtn');
    const btnText = document.getElementById('btnText');
    const btnSpinner = document.getElementById('btnSpinner');
    const errorMsg = document.getElementById('errorMsg');

    // Animasi masuk modal
    window.addEventListener('DOMContentLoaded', () => {
      modalBox.classList.add('modal-enter');
      requestAnimationFrame(() => {
        modalBox.classList.add('modal-enter-active');
        modalBox.classList.remove('opacity-0', 'scale-95', 'translate-y-[-20px]');
      });
    });

    // Tutup modal
    function closeModal() {
      modalBox.classList.add('modal-leave');
      modalBox.classList.add('modal-leave-active');
      setTimeout(() => {
        modal.close();
      }, 300);
    }

    closeBtn.addEventListener('click', closeModal);
    modal.addEventListener('click', (e) => {
      if(e.target === modal) closeModal();
    });
    document.addEventListener('keydown', (e) => {
      if(e.key === 'Escape') closeModal();
    });

    // Loader saat submit
    loginForm.addEventListener('submit', () => {
      btnText.classList.add('opacity-0');
      btnSpinner.classList.remove('hidden');
      loginBtn.disabled = true;
    });

    // Animasi shake saat error
    @if($errors->any())
      errorMsg.classList.remove('shake');
      void errorMsg.offsetWidth;
      errorMsg.classList.add('shake');
      // reset spinner jika sebelumnya diklik
      btnText.classList.remove('opacity-0');
      btnSpinner.classList.add('hidden');
      loginBtn.disabled = false;
    @endif
  </script>

</body>
</html>
