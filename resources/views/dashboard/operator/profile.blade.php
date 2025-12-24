@extends('dashboard.operator.app')

@section('content')
<div class="p-6 max-w-4xl mx-auto space-y-10">

    {{-- HEADER --}}
    <div class="text-center space-y-3">
        <h1 class="text-4xl md:text-5xl font-extrabold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
            Profil Operator
        </h1>
        <p class="text-gray-500 dark:text-gray-400 text-lg">
            Kelola informasi akun & perbarui avatar.
        </p>
    </div>

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
    <div class="alert alert-success shadow-lg rounded-xl">
        <span class="font-semibold">{{ session('success') }}</span>
    </div>
    @endif

    {{-- FORM --}}
    <div class="bg-white/70 dark:bg-gray-900/50 backdrop-blur-2xl border border-gray-200/30 dark:border-white/10 shadow-2xl p-10 rounded-3xl space-y-8">
        <form action="{{ route('operator.profile.update') }}" method="POST" enctype="multipart/form-data" id="profileForm">
            @csrf

            {{-- AVATAR --}}
            <div class="flex flex-col items-center space-y-4">
                <div class="relative w-40 h-40 rounded-full overflow-hidden shadow-xl border-4 border-indigo-500/80">
                    <img id="avatarImage" src="{{ $user->avatar_url }}" class="w-40 h-40 rounded-full object-cover cursor-pointer" />
                </div>
                <div class="flex items-center gap-3">
                    <label class="btn btn-primary btn-sm rounded-xl cursor-pointer">
                        Unggah Avatar
                        <input type="file" id="avatarInput" accept="image/*" class="hidden">
                    </label>
                </div>
            </div>

            {{-- HIDDEN BASE64 --}}
            <input type="hidden" name="avatar" id="avatarData">

            {{-- INPUT --}}
            <div class="space-y-6">
                <div class="form-control">
                    <label class="label"><span class="label-text font-medium">Nama</span></label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="input input-bordered w-full rounded-xl" />
                </div>

                <div class="form-control">
                    <label class="label"><span class="label-text font-medium">Email</span></label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="input input-bordered w-full rounded-xl" />
                </div>

                <div class="form-control">
                    <label class="label"><span class="label-text font-medium">Password Baru</span></label>
                    <input type="password" name="password" class="input input-bordered w-full rounded-xl" />
                </div>

                <div class="form-control">
                    <label class="label"><span class="label-text font-medium">Konfirmasi Password</span></label>
                    <input type="password" name="password_confirmation" class="input input-bordered w-full rounded-xl" />
                </div>
            </div>

            {{-- SUBMIT --}}
            <button type="submit" class="btn btn-primary btn-block rounded-2xl text-lg">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const avatarInput = document.getElementById('avatarInput');
    const avatarImage = document.getElementById('avatarImage');
    const avatarData  = document.getElementById('avatarData');
    const form        = document.getElementById('profileForm');

    let avatarChanged = false;

    // Preview avatar
    avatarInput.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;
        avatarChanged = true;

        const reader = new FileReader();
        reader.onload = function(event) {
            avatarImage.src = event.target.result;
        };
        reader.readAsDataURL(file);
    });

    // Konversi Base64 sebelum submit
    form.addEventListener('submit', function (e) {
        if (!avatarChanged) return; // avatar tidak berubah, submit langsung

        e.preventDefault();

        const img = new Image();
        img.src = avatarImage.src;

        img.onload = function() {
            const canvas = document.createElement('canvas');
            const size = 400;
            canvas.width = size;
            canvas.height = size;
            const ctx = canvas.getContext('2d');

            ctx.beginPath();
            ctx.arc(size/2, size/2, size/2, 0, Math.PI * 2);
            ctx.clip();
            ctx.drawImage(img, 0, 0, size, size);

            avatarData.value = canvas.toDataURL('image/png');

            form.submit(); // submit ulang setelah Base64 terisi
        };
    });
});
</script>
@endsection
