<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Solartech Admin Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      /* background-image: url('https://wallpapers.com/images/featured/car-wash-0d91u3sqo0qw441a.jpg'); */
        /* background-image: url('https://media.licdn.com/dms/image/v2/D4D12AQGA6odm93XONA/article-cover_image-shrink_720_1280/article-cover_image-shrink_720_1280/0/1675839423933?e=2147483647&v=beta&t=sFnxpwfxHjga1IoNNkjDrAz6bC4PVixKPM7B_84bthI');
      */
        background-image: url("{{ asset('setting/banner/1763827137.jpg') }}");
      background-size: cover;
      background-position: center;
    }

    .glass {
      backdrop-filter: blur(10px);
      background: rgba(255, 255, 255, 0.2);
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .btn-hover:hover {
      transform: translateY(-2px) scale(1.02);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    ::placeholder {
      color: rgba(255, 255, 255, 0.8);
    }

    .logo-img {
    width: 200px;   /* or any size you want */
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4">

  <div class="w-full max-w-md p-8 rounded-3xl glass text-white shadow-2xl">
    <div class="text-center mb-6">
      <img src="{{ asset('setting/banner/solar.png') }}" alt="Solar Panel Logo" class="logo-img mx-auto mb-4">
      <h2 class="text-3xl font-bold tracking-wide">Solartech Services</h2>
      <p class="text-sm text-white/80">Clean Energy. Bright Future.</p>
    </div>

    <form action="{{ route('frontend.auth.login') }}" method="POST" class="space-y-5" id="loginForm">
        @csrf
      <div>
        <label class="block text-sm font-semibold text-white/80 mb-1">Email</label>
        <input type="email" name="email" required placeholder="you@example.com"
          class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/30 text-white focus:outline-none focus:ring-2 focus:ring-blue-300" />
      </div>
        @error('email')
            <span class="invalid-feedback" role="alert" style="text-align:center">
                <strong style="color: red">{{ $message }}</strong>
            </span>
        @enderror
      <div>
        <label class="block text-sm font-semibold text-white/80 mb-1">Password</label>
        <input type="password" name="password" required placeholder="••••••••"
          class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/30 text-white focus:outline-none focus:ring-2 focus:ring-blue-300" />
      </div>

      <div class="flex justify-between items-center text-sm text-white/80">
        <label class="flex items-center">
          <input type="checkbox" class="mr-2 accent-blue-400" /> Remember me
        </label>
        {{-- <a href="#" class="hover:underline text-blue-200">Forgot password?</a> --}}
      </div>

      <button type="submit"
        class="w-full py-3 rounded-lg bg-blue-500 text-white font-semibold tracking-wide transition-all btn-hover">
        ⚡ Login Now
      </button>
    </form>

  </div>

</body>
</html>
