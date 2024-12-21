@extends('layout.admin')

@section('title', 'إعدادات المدير')

@section('header', 'إعدادات الحساب')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-semibold text-gray-700 mb-6">إعدادات الحساب</h2>
        
        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success bg-green-100 text-green-800 border border-green-300 rounded p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form to update admin details -->
        <form action="{{ route('admin.settings.update') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-600 font-medium">الاسم</label>
                <input type="text" class="form-input mt-2 w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500" id="name" name="name" value="{{ old('name', $admin->name) }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-600 font-medium">البريد الإلكتروني</label>
                <input type="email" class="form-input mt-2 w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500" id="email" name="email" value="{{ old('email', $admin->email) }}" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-600 font-medium">كلمة المرور الجديدة (اختياري)</label>
                <input type="password" class="form-input mt-2 w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500" id="password" name="password">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-600 font-medium">تأكيد كلمة المرور</label>
                <input type="password" class="form-input mt-2 w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500" id="password_confirmation" name="password_confirmation">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="btn bg-teal-600 text-white hover:bg-teal-700 py-2 px-6 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-opacity-50">
                    حفظ التعديلات
                </button>
            </div>
        </form>
    </div>
@endsection
