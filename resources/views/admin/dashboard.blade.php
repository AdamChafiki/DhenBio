<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="w-full max-w-2xl p-8 bg-white rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-4">مرحباً بك في لوحة التحكم</h1>
        <p>هذه لوحة التحكم الخاصة بك كمدير.</p>
        <a href="/admin/logout" class="text-blue-500 mt-4 inline-block">تسجيل الخروج</a>
    </div>
</body>
</html>
