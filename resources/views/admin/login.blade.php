<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل دخول</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white rounded-lg p-8 shadow-lg">
        <h1 class="text-2xl font-bold text-center mb-4">تسجيل دخول</h1>

        <!-- Login Form -->
        <form action="/admin/login" method="POST">
            @csrf
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700">البريد الإلكتروني</label>
                <input type="email" name="email" id="email" class="w-full p-3 border border-gray-300 rounded-lg"
                    placeholder="أدخل البريد الإلكتروني" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700">كلمة المرور</label>
                <input type="password" name="password" id="password"
                    class="w-full p-3 border border-gray-300 rounded-lg" placeholder="أدخل كلمة المرور" required>
                @error('password')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Error Message -->
            @if ($errors->any())
                <div class="bg-red-500 text-white p-2 rounded-md mb-4 flex  items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-xbox-x ml-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M12 2c5.523 0 10 4.477 10 10s-4.477 10 -10 10s-10 -4.477 -10 -10s4.477 -10 10 -10m3.6 5.2a1 1 0 0 0 -1.4 .2l-2.2 2.933l-2.2 -2.933a1 1 0 1 0 -1.6 1.2l2.55 3.4l-2.55 3.4a1 1 0 1 0 1.6 1.2l2.2 -2.933l2.2 2.933a1 1 0 0 0 1.6 -1.2l-2.55 -3.4l2.55 -3.4a1 1 0 0 0 -.2 -1.4" />
                    </svg>{{ $errors->first('message') }}
                </div>
            @endif

            <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg">تسجيل الدخول</button>
        </form>
    </div>
</body>

</html>
