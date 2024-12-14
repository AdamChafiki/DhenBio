<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
        content="[ar]على طريق السعادة ، تجدنا في انتظارك ... تستنشق من عبير منتوجاتنا الحياة ... الاصالة ، والعراقة ، والصفاء ... #دهن_بيو والسعادة  للجميع 🌹دهن بيو ،، الراعي الرسمي للسعادة[/ar][en]On the path of happiness, you'll find us waiting for you... Inhale the essence of our products, life... Authenticity, heritage, and purity... #Dhenbio and happiness for everyone 🌹... Dhenbio .. The Official Sponsor of Happiness[/en][fr]Sur le chemin du bonheur, vous nous trouverez en train de vous attendre... Respirez l'essence de nos produits, la vie... Authenticité, patrimoine et pureté... #Dhenbio et bonheur pour tous 🌹 ... Dhenbio.. Le sponsor officiel du bonheur[/fr]">
    <meta name="tags"
        content="dhenbio,dhen.bio,دهن بيو,دهنبيو,عسل,حر,الزعتر,سدر,دغموس,زكوم,زعفران,زيت,أركان,كاليبتوس,أوكالبتوس,سمن,أملو,لوز,أرغان,Dhen bio,عسل الشوكيات،خل التفاح،خل،تفاح،مول الفوقية شخصيا،ياسين">
    <link rel="shortcut icon" href="https://dhenbio.com/storage/img/favicon.png" type="image/png">
    <!-- Styles / Scripts -->
    @vite('resources/css/app.css')
    <title>@yield('title', 'Dhen Bio')</title>
</head>

<body>
    <!-- Header -->
    <header class="bg-white py-6">
        <div class="mx-auto flex h-16 max-w-screen-xl items-center gap-8 px-4 sm:px-6 lg:px-8">
            <a href="#">
                <img src="https://dhenbio.com/storage/img/logo.1654528955.png" style="max-height:65px" alt="DhenBio">
            </a>

            <div class="flex flex-1 items-center justify-end md:justify-between">
                <nav aria-label="Global" class="hidden md:block">
                    <ul class="flex items-center gap-6 text-sm">
                        <li>
                            <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> أملو و منتوجات
                                أخرى </a>
                        </li>

                        <li>
                            <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> العروض </a>
                        </li>

                        <li>
                            <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> زيت أركان </a>
                        </li>

                        <li>
                            <a class="text-gray-500 transition hover:text-gray-500/75" href="#">
                                عسل </a>
                        </li>
                    </ul>
                </nav>

                <div class="flex items-center gap-4">
                    <div class="sm:flex sm:gap-4">
                        <a class="flex items-center rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-teal-700"
                            href="#">
                            (1)
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M17 17h-11v-14h-2" />
                                <path d="M6 5l14 1l-1 7h-13" />
                            </svg>
                        </a>
                    </div>
                    <button
                        class="block rounded bg-gray-100 p-2.5 text-gray-600 transition hover:text-gray-600/75 md:hidden">
                        <span class="sr-only">Toggle menu</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class=" min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white">
        <div class="mx-auto max-w-screen-xl space-y-8 px-4 py-16 sm:px-6 lg:space-y-16 lg:px-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="text-teal-600">
                    <img src="https://dhenbio.com/storage/img/logo.1654528955.png" style="max-height:65px"
                        alt="DhenBio">

                </div>

                <ul class="mt-8 flex justify-start gap-6 sm:mt-0 sm:justify-end">
                    <li>
                        <a href="#" rel="noreferrer" target="_blank"
                            class="text-gray-700 transition hover:opacity-75">
                            <span class="sr-only">Facebook</span>

                            <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>

                    <li>
                        <a href="#" rel="noreferrer" target="_blank"
                            class="text-gray-700 transition hover:opacity-75">
                            <span class="sr-only">Instagram</span>

                            <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="grid grid-cols-1 gap-8 border-t border-gray-100 pt-8 sm:grid-cols-2 lg:grid-cols-4 lg:pt-16">
                <div>
                    <p class="font-medium text-gray-900">روابط</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a href="#" class="text-gray-700 transition hover:opacity-75"> اتصل بنا </a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-700 transition hover:opacity-75">]سياسة </a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-700 transition hover:opacity-75"> Accounts Review </a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-700 transition hover:opacity-75"> HR Consulting </a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-700 transition hover:opacity-75"> SEO Optimisation </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p class="font-medium text-gray-900">Company</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a href="#" class="text-gray-700 transition hover:opacity-75"> About </a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-700 transition hover:opacity-75"> Meet the Team </a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-700 transition hover:opacity-75"> Accounts Review </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p class="font-medium text-gray-900">Helpful Links</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a href="#" class="text-gray-700 transition hover:opacity-75"> Contact </a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-700 transition hover:opacity-75"> FAQs </a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-700 transition hover:opacity-75"> Live Chat </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p class="font-medium text-gray-900">Legal</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a href="#" class="text-gray-700 transition hover:opacity-75"> Accessibility </a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-700 transition hover:opacity-75"> Returns Policy </a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-700 transition hover:opacity-75"> Refund Policy </a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-700 transition hover:opacity-75"> Hiring Statistics
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <p class="text-xs text-gray-500">&copy; 2022. Company Name. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
