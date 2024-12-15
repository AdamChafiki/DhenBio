<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dhen Bio')</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex">
        <div class="flex h-screen flex-col w-96 justify-between border-e bg-white">
            <div class="px-4 py-6">
                <span class="grid h-20 w-20 rounded-full place-content-center bg-gray-100 text-xs text-gray-600">
                    <img alt="" src="https://dhenbio.com/storage/img/logo.1654528955.png"
                        class="size-16 rounded-full object-contain" />
                </span>

                <ul class="mt-6 space-y-1">
                    <li>
                        <a href="#"
                            class="block rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700">
                            اللوحة الرئيسية
                        </a>
                    </li>

                    <li>
                        <details class="group [&_summary::-webkit-details-marker]:hidden">
                            <summary
                                class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                                <span class="text-sm font-medium"> المنتجات </span>

                                <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </summary>

                            <ul class="mt-2 space-y-1 px-4">
                                <li>
                                    <a href="#"
                                        class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                                        قائمة المنتجات
                                    </a>
                                </li>

                                <li>
                                    <a href="#"
                                        class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                                        إضافة منتج
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </li>

                    <li>
                        <a href="#"
                            class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                            الطلبات
                        </a>
                    </li>

                    <li>
                        <a href="#"
                            class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                            العملاء
                        </a>
                    </li>

                    <li>
                        <details class="group [&_summary::-webkit-details-marker]:hidden">
                            <summary
                                class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                                <span class="text-sm font-medium"> الملف الشخصي </span>

                                <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </summary>

                            <ul class="mt-2 space-y-1 px-4">
                                <li>
                                    <a href="#"
                                        class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                                        الإعدادات
                                    </a>
                                </li>

                                <li>
                                    <form action="{{ route('admin.logout') }}" method="GET">
                                        @csrf
                                        <button type="submit"
                                            class="w-full flex items-center rounded-lg px-4 py-2 text-sm font-medium text-gray-500 [text-align:_inherit] hover:bg-gray-100 hover:text-gray-700">
                                            تسجيل الخروج
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-logout-2 mr-2">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" />
                                                <path d="M15 12h-12l3 -3" />
                                                <path d="M6 15l-3 -3" />
                                            </svg>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </details>
                    </li>
                </ul>
            </div>

            <div class="sticky inset-x-0 bottom-0 border-t border-gray-100">
                <a href="#" class="flex items-center gap-2 bg-white p-4 hover:bg-gray-50">
                    <img alt="" src="https://dhenbio.com/storage/img/logo.1654528955.png"
                        class="size-10 rounded-full object-contain" />

                    <div>
                        <p class="text-xs">
                            <strong class="block font-medium">{{ $admin->name }}</strong>

                            <span>{{ $admin->email }}</span>
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <main class="min-h-screen">
            @yield('content')
        </main>
    </div>
</body>

</html>
