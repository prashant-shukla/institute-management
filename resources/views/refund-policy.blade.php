<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refund & Cancellation Policy | CADADDA</title>
    <script src="https://cdn.tailwindcss.com/3.4.1"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: { extend: {} }
        }
    </script>
</head>

<body class="bg-gray-50 dark:bg-gray-950 transition-colors duration-300">
    <!-- ===== NAVBAR (same pattern as other pages) ===== -->
    <header
        class="bg-white/90 dark:bg-gray-900/90 backdrop-blur shadow-sm sticky top-0 z-50 transition-colors duration-300">
        <nav class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">C</span>
                    </div>
                    <span
                        class="text-2xl font-bold text-gray-900 dark:text-white transition-colors duration-300">CADADDA</span>
                </div>

                <!-- Mobile toggle -->
                <button class="md:hidden text-gray-700 dark:text-gray-300" onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <!-- Desktop nav -->
                <div class="hidden md:flex items-center space-x-8 text-sm font-medium">
                    <a href="{{ url('/') }}"
                       class="text-gray-700 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">Home</a>
                    <a href="{{ url('/Course') }}"
                       class="text-gray-700 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">Courses</a>
                    <a href="{{ url('/events') }}"
                       class="text-gray-700 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">Event</a>
                    <a href="{{ url('/Gallery') }}"
                       class="text-gray-700 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">Gallery</a>
                    <a href="{{ url('/blogs') }}"
                       class="text-gray-700 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">Blogs</a>
                    <a href="{{ url('/placement') }}"
                       class="text-gray-700 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">Jobs</a>
                    <a href="{{ url('/Exams') }}"
                       class="text-gray-700 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">Exams</a>
                    <a href="{{ url('/contact') }}"
                       class="text-gray-700 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">Contact Us</a>
                </div>

                <!-- Right buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    <button id="darkModeToggle"
                            class="p-2 text-gray-700 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800"
                            onclick="toggleDarkMode()">
                        <svg id="sunIcon" class="w-5 h-5 hidden" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <svg id="moonIcon" class="w-5 h-5" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button>

                    <a href="{{ route('login') }}"
                       class="px-4 py-2 text-blue-600 border border-blue-500 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/20 text-sm font-semibold">
                        Sign in
                    </a>

                    <a href="{{ route('register') }}"
                       class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm font-semibold">
                        Join Now
                    </a>
                </div>
            </div>

            <!-- Mobile menu -->
            <div id="mobileMenu" class="hidden mt-3 md:hidden">
                <div class="flex flex-col space-y-2 pb-3 border-t border-gray-200 dark:border-gray-700 pt-3 text-sm">
                    <a href="{{ url('/') }}"
                       class="text-gray-700 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">Home</a>
                    <a href="{{ url('/Course') }}"
                       class="text-gray-700 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">Courses</a>
                    <a href="{{ url('/events') }}"
                       class="text-gray-700 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">Event</a>
                    <a href="{{ url('/Gallery') }}"
                       class="text-gray-700 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">Gallery</a>
                    <a href="{{ url('/blogs') }}"
                       class="text-gray-700 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">Blogs</a>
                    <a href="{{ url('/placement') }}"
                       class="text-gray-700 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">Jobs</a>
                    <a href="{{ url('/Exams') }}"
                       class="text-gray-700 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">Exams</a>
                    <a href="{{ url('/contact') }}"
                       class="text-gray-700 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">Contact Us</a>

                    <div class="flex space-x-2 pt-2">
                        <a href="{{ route('login') }}"
                           class="flex-1 px-4 py-2 text-blue-600 border border-blue-500 rounded-lg text-center hover:bg-blue-50 dark:hover:bg-blue-900/20">
                            Sign in
                        </a>
                        <a href="{{ route('register') }}"
                           class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg text-center hover:bg-blue-700">
                            Join Now
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- ========= REFUND & CANCELLATION POLICY CONTENT ========= -->
    <main class="relative">
        <div
            class="pointer-events-none absolute inset-0 bg-gradient-to-b  from-blue-50 via-gray-50 to-white dark:from-amber-950 dark:via-gray-950 dark:to-black/90">
        </div>

        <section class="relative container mx-auto px-4 py-10 lg:py-14">
            <!-- Top heading / breadcrumb -->
            <div class="mb-6 lg:mb-10 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div class="space-y-3">
                    <nav class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 flex items-center space-x-1">
                        <a href="{{ url('/') }}"
                           class="hover:text-blue-600 dark:hover:text-blue-400 font-medium">Home</a>
                        <span>/</span>
                        <span class="text-gray-400">Legal</span>
                        <span>/</span>
                        <span class="text-gray-700 dark:text-gray-200 font-semibold">Refund &amp; Cancellation</span>
                    </nav>
                    <div>
                        <h1
                            class="text-3xl sm:text-4xl font-bold tracking-tight text-gray-900 dark:text-white flex items-center gap-3">
                            Refund &amp; Cancellation Policy
                            <span
                                class="inline-flex items-center rounded-full border border-amber-100 bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700 dark:border-amber-500/40 dark:bg-amber-900/40 dark:text-amber-200">
                                Customer First Policy
                            </span>
                        </h1>
                        <p class="mt-2 text-sm sm:text-base text-gray-600 dark:text-gray-400 max-w-2xl">
                            Our focus is complete customer satisfaction. This page explains when and how cancellations
                            and refunds are handled at CADADDA.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col items-start lg:items-end gap-2 text-xs sm:text-sm text-gray-600 dark:text-gray-300">
                    <span class="inline-flex items-center rounded-xl bg-gray-100 dark:bg-gray-800 px-3 py-1">
                        Need help? Email:
                        <a href="mailto:info@cadadda.com"
                           class="ml-1 font-semibold text-blue-600 dark:text-blue-300">info@cadadda.com</a>
                    </span>
                    <span class="inline-flex items-center rounded-xl bg-gray-100 dark:bg-gray-800 px-3 py-1">
                        Support:
                        <span class="ml-1 font-semibold">+91-9261077888</span>
                    </span>
                </div>
            </div>

            <div class="grid lg:grid-cols-[260px,minmax(0,1fr)] gap-6 lg:gap-8">
                <!-- Left-side section nav -->
                <aside
                    class="hidden lg:flex flex-col rounded-2xl border border-gray-200/80 dark:border-gray-700 bg-white/80 dark:bg-gray-900/80 shadow-sm p-4 h-fit sticky top-24">
                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-3">
                        Sections
                    </p>
                    <nav class="space-y-1 text-sm">
                        <a href="#overview"
                           class="block px-3 py-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-amber-50 hover:text-amber-800 dark:hover:bg-amber-900/40 dark:hover:text-amber-200">
                            Overview
                        </a>
                        <a href="#cancellation"
                           class="block px-3 py-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-amber-50 hover:text-amber-800 dark:hover:bg-amber-900/40 dark:hover:text-amber-200">
                            Cancellation Policy
                        </a>
                        <a href="#refund"
                           class="block px-3 py-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-amber-50 hover:text-amber-800 dark:hover:bg-amber-900/40 dark:hover:text-amber-200">
                            Refund Policy
                        </a>
                    </nav>
                </aside>

                <!-- Main text card -->
                <div
                    class="rounded-2xl border border-gray-200 dark:border-gray-800 bg-white/90 dark:bg-gray-900/90 shadow-md">
                    <div
                        class="px-5 sm:px-8 py-6 sm:py-8 space-y-8 text-sm sm:text-base leading-relaxed text-gray-700 dark:text-gray-200">

                        <!-- Overview -->
                        <section id="overview" class="space-y-3">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white">
                                    01
                                </div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Overview
                                </h2>
                            </div>
                            <p>
                                Our focus is <span class="font-semibold">complete customer satisfaction.</span> If you
                                are displeased with the services provided, we will make every reasonable effort to
                                resolve the issue and, where applicable, refund the amount paid — provided the reasons
                                are genuine and can be verified after proper investigation.
                            </p>
                            <p>
                                We strongly advise you to read the details and fine print related to each service or
                                rule before making a payment. These details describe what is included in the service or
                                product you are purchasing.
                            </p>
                            <p>
                                In case of dissatisfaction with our services, clients have the liberty to request
                                cancellation of their project or service and, where applicable, request a refund, in
                                accordance with the policies mentioned below.
                            </p>
                        </section>

                        <div class="border-t border-dashed border-gray-200 dark:border-gray-700"></div>

                        <!-- Cancellation Policy -->
                        <section id="cancellation" class="space-y-3">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white">
                                    02
                                </div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Cancellation Policy
                                </h2>
                            </div>

                            <div class="rounded-xl bg-gray-50 dark:bg-gray-800/80 p-4 space-y-3">
                                <p>
                                    For any cancellations, you can contact us at our office address or write to us at
                                    our official email ID:
                                    <a href="mailto:info@cadadda.com"
                                       class="text-blue-600 dark:text-blue-300 underline">info@cadadda.com</a>.
                                </p>
                                <p>
                                    Requests for cancellation received <span class="font-semibold">later than 10
                                    business days prior to the end of the current service period</span> will be treated
                                    as cancellations for the <span class="font-semibold">next service period</span>.
                                </p>
                                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                                    Note: Service period may refer to course duration, subscription cycle, or project
                                    phase, as applicable and communicated at the time of enrollment.
                                </p>
                            </div>
                        </section>

                        <div class="border-t border-dashed border-gray-200 dark:border-gray-700"></div>

                        <!-- Refund Policy -->
                        <section id="refund" class="space-y-3 pb-2">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white">
                                    03
                                </div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Refund Policy
                                </h2>
                            </div>

                            <p>
                                We always try our best to create suitable and satisfactory design concepts, training
                                content and services for our clients and students. However, we understand that in rare
                                cases expectations may not be fully met.
                            </p>

                            <div class="rounded-xl bg-gray-50 dark:bg-gray-800/80 p-4 space-y-3">
                                <ul class="list-disc list-inside space-y-2 ml-2">
                                    <li>
                                        In case any client is not completely satisfied with our products or services,
                                        they may request a refund. The request will be reviewed on a case-by-case basis.
                                    </li>
                                    <li>
                                        Approved refunds will be processed to the <span class="font-semibold">same
                                        account</span> from which the payment was originally received.
                                    </li>
                                    <li>
                                        We aim to process eligible refunds within
                                        <span class="font-semibold">48 working hours</span> from the time of approval.
                                    </li>
                                    <li>
                                        As we are primarily a training provider and most decisions regarding courses and
                                        registrations are taken offline and confirmed with the student, there is
                                        generally <span class="font-semibold">no clause to cancel</span> a course
                                        enrollment once classes or services have commenced.
                                    </li>
                                    <li>
                                        Refunds are typically considered only in cases where:
                                        <ul class="list-disc list-inside ml-4 mt-1 text-sm">
                                            <li>Payment has been made by mistake (e.g., duplicate transaction), or</li>
                                            <li>There is a clear transaction error or technical problem during payment.
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                                    Note: Final decision on refunds remains at the sole discretion of CADADDA after
                                    internal verification and investigation.
                                </p>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- ===== SIMPLE FOOTER ===== -->
    <footer class="bg-gray-900 dark:bg-black text-white pt-10 pb-6 mt-6">
        <div class="container mx-auto px-4">
            <div class="border-t border-gray-800 dark:border-gray-700 pt-4 flex flex-col md:flex-row items-center justify-between gap-3">
                <p class="text-gray-400 text-xs sm:text-sm">
                    © 2025 CADADDA. All rights reserved. | Autodesk Authorized Training Institute
                </p>
                <div class="flex flex-wrap gap-4 text-xs sm:text-sm">
                    <a href="{{ url('/privacy-policy') }}" class="text-gray-400 hover:text-white">Privacy Policy</a>
                    <a href="{{ url('/terms-and-conditions') }}" class="text-gray-400 hover:text-white">Terms of Service</a>
                    <a href="{{ url('/refund-policy') }}" class="text-gray-400 hover:text-white">Refund Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        function toggleDarkMode() {
            const html = document.documentElement;
            const sun = document.getElementById('sunIcon');
            const moon = document.getElementById('moonIcon');
            html.classList.toggle('dark');
            const isDark = html.classList.contains('dark');
            sun.classList.toggle('hidden', !isDark);
            moon.classList.toggle('hidden', isDark);
        }
    </script>
</body>
</html>
