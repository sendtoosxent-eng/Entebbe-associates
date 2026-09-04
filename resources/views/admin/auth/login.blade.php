<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login · Entebbe Associated Advocates</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
  body { font-family: 'Inter', sans-serif; background: linear-gradient(160deg,#000f22 0%,#05192e 60%,#0a2540 100%); }
  .font-display { font-family: 'Playfair Display', serif; }
</style>
</head>
<body class="min-h-screen flex items-center justify-center px-4">

  <div class="w-full max-w-md">
    <div class="text-center mb-8">
      <h1 class="font-display text-white text-2xl font-bold">Entebbe Associated Advocates</h1>
      <p class="text-[#fdc34d] text-xs uppercase tracking-widest mt-2">Admin Panel</p>
    </div>

    <div class="bg-white rounded-2xl shadow-2xl p-8">
      <h2 class="text-lg font-bold text-[#000f22] mb-6">Sign in</h2>

      @if($errors->any())
      <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
        @foreach($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
      @endif

      <form method="POST" action="{{ route('admin.login.attempt') }}" class="space-y-5">
        @csrf
        <div>
          <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Email</label>
          <input type="email" name="email" value="{{ old('email') }}" required autofocus
                 class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] focus:border-transparent outline-none">
        </div>
        <div>
          <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Password</label>
          <input type="password" name="password" required
                 class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] focus:border-transparent outline-none">
        </div>
        <label class="flex items-center gap-2 text-sm text-gray-600">
          <input type="checkbox" name="remember" class="rounded border-gray-300">
          Remember me
        </label>
        <button type="submit" class="w-full bg-[#000f22] text-white py-3 rounded-lg font-semibold text-sm hover:bg-[#7b5800] transition-all">
          Sign In
        </button>
      </form>
    </div>
  </div>

</body>
</html>
