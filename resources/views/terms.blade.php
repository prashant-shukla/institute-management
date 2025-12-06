<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADADDA - Autodesk Authorized CAD/CAM Training Institute</title>
    <script src="https://cdn.tailwindcss.com/3.4.1"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'slide-in': 'slideIn 0.5s ease-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'slide-right': 'slideRight 0.6s ease-out',
                        'fade-in': 'fadeIn 0.8s ease-out',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-20px)'
                            },
                        },
                        slideIn: {
                            '0%': {
                                transform: 'translateX(-100%)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateX(0)',
                                opacity: '1'
                            },
                        },
                        slideUp: {
                            '0%': {
                                transform: 'translateY(50px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            },
                        },
                        slideRight: {
                            '0%': {
                                transform: 'translateX(50px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateX(0)',
                                opacity: '1'
                            },
                        },
                        fadeIn: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Slide animations */
        .slide-in-left {
            animation: slideInLeft 0.8s ease-out forwards;
        }

        .slide-in-right {
            animation: slideInRight 0.8s ease-out forwards;
        }

        .slide-in-up {
            animation: slideInUp 0.8s ease-out forwards;
        }

        /* Initial states */
        .slide-in-left,
        .slide-in-right,
        .slide-in-up {
            opacity: 0;
        }

        /* Keyframes */
        @keyframes slideInLeft {
            0% {
                transform: translateX(-100px);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideInRight {
            0% {
                transform: translateX(100px);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideInUp {
            0% {
                transform: translateY(50px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Counter animation styles */
        .counter {
            display: inline-block;
            transition: all 0.3s ease;
        }

        .counter.animate {
            transform: scale(1.1);
            color: #fbbf24;
        }

        /* Ensure animations work on all browsers */
        .slide-in-left,
        .slide-in-right,
        .slide-in-up {
            will-change: transform, opacity;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <!-- Header / Navbar -->
    <header
        class="bg-white dark:bg-gray-800 shadow-md dark:shadow-gray-900/50 sticky top-0 z-50 transition-colors duration-300">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">C</span>
                    </div>
                    <span
                        class="text-2xl font-bold text-gray-800 dark:text-white transition-colors duration-300">CADADDA</span>
                </div>

                <!-- Mobile Menu Toggle -->
                <button class="md:hidden text-gray-700 dark:text-gray-300 transition-colors duration-300"
                    onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ url('/') }}"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Home</a>

                    <a href="{{ url('/Course') }}"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Courses</a>

                    <a href="{{ url('/events') }}"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Event</a>

                    <a href="{{ url('/Gallery') }}"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Gallery</a>

                    <a href="{{ url('/blogs') }}"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Blogs</a>

                    <a href="{{ url('/placement') }}"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Jobs</a>

                    <a href="{{ url('/Exams') }}"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Exams</a>

                    <a href="{{ url('/contact') }}"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Contact
                        Us</a>
                </div>


                <!-- Dark Mode Toggle & Auth Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    <!-- Dark Mode Toggle -->
                    <button id="darkModeToggle"
                        class="p-2 text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700"
                        onclick="toggleDarkMode()">
                        <svg id="sunIcon" class="w-5 h-5 hidden" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                        <svg id="moonIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                            </path>
                        </svg>
                    </button>

                    <a href="{{ route('login') }}"
                        class="px-4 py-2 text-blue-500 border border-blue-500 rounded-lg hover:bg-blue-50 transition-colors font-medium">
                        Sign in
                    </a>

                    <a href="{{ route('register') }}"
                        class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors font-medium">
                        Join Now
                    </a>

                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobileMenu" class="hidden mt-4 md:hidden">
                <div class="flex flex-col space-y-3">
                    <a href="#home"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Home</a>
                    <a href="#courses"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Courses</a>
                    <a href="#event"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Event</a>
                    <a href="#gallery"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Gallery</a>
                    <a href="#jobs"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Jobs</a>
                    <a href="#contact"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Contact
                        Us</a>
                    <div class="flex space-x-2 pt-3">
                        <button
                            class="flex-1 px-4 py-2 text-blue-500 dark:text-blue-400 border border-blue-500 dark:border-blue-400 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors font-medium">
                            Sign in
                        </button>
                        <button
                            class="flex-1 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors font-medium">
                            Join Now
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- ========= NEW TERMS PAGE UI ========= -->
    <main class="relative">
        <!-- Background -->
        <div
            class="pointer-events-none absolute inset-0 bg-gradient-to-b from-blue-50 via-gray-50 to-white dark:from-blue-950 dark:via-gray-950 dark:to-black/90">
        </div>

        <section class="relative container mx-auto px-4 py-10 lg:py-14">
            <!-- breadcrumb + title top -->
            <div class="mb-6 lg:mb-10 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div class="space-y-3">
                    <nav class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 flex items-center space-x-1">
                        <a href="{{ url('/') }}"
                            class="hover:text-blue-600 dark:hover:text-blue-400 font-medium">Home</a>
                        <span>/</span>
                        <span class="text-gray-400">Legal</span>
                        <span>/</span>
                        <span class="text-gray-700 dark:text-gray-200 font-semibold">Terms &amp; Conditions</span>
                    </nav>
                    <div>
                        <h1
                            class="text-3xl sm:text-4xl font-bold tracking-tight text-gray-900 dark:text-white flex items-center gap-3">
                            Terms &amp; Conditions
                            <span
                                class="inline-flex items-center rounded-full border border-blue-100 bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700 dark:border-blue-500/40 dark:bg-blue-900/40 dark:text-blue-200">
                                Updated • 2025
                            </span>
                        </h1>
                        <p class="mt-2 text-sm sm:text-base text-gray-600 dark:text-gray-400 max-w-2xl">
                            Please read these terms carefully. By accessing or using the CADADDA website, you agree to
                            be bound by them.
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <span
                        class="inline-flex items-center rounded-xl bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-200">
                        Autodesk Authorized Training Center
                    </span>
                </div>
            </div>

            <div class="grid lg:grid-cols-[260px,minmax(0,1fr)] gap-6 lg:gap-8">
                <!-- Left sidebar nav -->
                <aside
                    class="hidden lg:flex flex-col rounded-2xl border border-gray-200/80 dark:border-gray-700 bg-white/70 dark:bg-gray-900/70 shadow-sm p-4 h-fit sticky top-24">
                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-3">
                        Sections
                    </p>
                    <nav class="space-y-1 text-sm">
                        <a href="#intro"
                            class="block px-3 py-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-blue-50 hover:text-blue-700 dark:hover:bg-blue-900/40 dark:hover:text-blue-200">
                            Overview
                        </a>
                        <a href="#use-of-content"
                            class="block px-3 py-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-blue-50 hover:text-blue-700 dark:hover:bg-blue-900/40 dark:hover:text-blue-200">
                            Use of Content
                        </a>
                        <a href="#acceptable-use"
                            class="block px-3 py-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-blue-50 hover:text-blue-700 dark:hover:bg-blue-900/40 dark:hover:text-blue-200">
                            Acceptable Website Use
                        </a>
                        <a href="#indemnity"
                            class="block px-3 py-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-blue-50 hover:text-blue-700 dark:hover:bg-blue-900/40 dark:hover:text-blue-200">
                            Indemnity
                        </a>
                        <a href="#liability"
                            class="block px-3 py-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-blue-50 hover:text-blue-700 dark:hover:bg-blue-900/40 dark:hover:text-blue-200">
                            Liability
                        </a>
                        <a href="#disclaimer"
                            class="block px-3 py-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-blue-50 hover:text-blue-700 dark:hover:bg-blue-900/40 dark:hover:text-blue-200">
                            Disclaimer
                        </a>
                    </nav>
                </aside>

                <!-- Main content -->
                <div
                    class="rounded-2xl border border-gray-200 dark:border-gray-800 bg-white/80 dark:bg-gray-900/80 shadow-md">
                    <div class="px-5 sm:px-8 py-6 sm:py-8 space-y-8 text-sm sm:text-base leading-relaxed text-gray-700 dark:text-gray-200">

                        <!-- Intro -->
                        <section id="intro" class="space-y-3">
                            <div class="inline-flex items-center gap-2 rounded-full bg-gray-100 dark:bg-gray-800 px-3 py-1 text-xs text-gray-600 dark:text-gray-300 mb-1">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                Legal Agreement Between You &amp; CADADDA
                            </div>
                            <p>
                                The terms <span class="font-semibold">"We" / "Us" / "Our" / “Company”</span>
                                individually and collectively refer to <span class="font-semibold">CADADDA</span> and
                                the terms <span class="font-semibold">"Visitor" / "User"</span> refer to the users.
                            </p>
                            <p>
                                This page states the Terms and Conditions under which you (Visitor) may visit this
                                website (“Website”). Please read this page carefully. If you do not accept the Terms and
                                Conditions stated here, we request you to exit this site.
                            </p>
                            <p>
                                The business, any of its business divisions and / or its subsidiaries, associate
                                companies or subsidiaries to subsidiaries or such other investment companies (in India
                                or abroad) reserve their respective rights to revise these Terms and Conditions at any
                                time by updating this posting. You should visit this page periodically to re-appraise
                                yourself of the Terms and Conditions, because they are binding on all users of this
                                Website.
                            </p>
                        </section>

                        <!-- Divider -->
                        <div class="border-t border-dashed border-gray-200 dark:border-gray-700"></div>

                        <!-- Use of Content -->
                        <section id="use-of-content" class="space-y-3">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white">
                                    01
                                </div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Use of Content
                                </h2>
                            </div>

                            <p>
                                All logos, brands, marks, headings, labels, names, signatures, numerals, shapes or any
                                combinations thereof, appearing on this site, except as otherwise noted, are properties
                                either owned, or used under licence, by the business and / or its associate entities who
                                feature on this Website. The use of these properties or any other content on this site,
                                except as provided in these Terms and Conditions or in the site content, is strictly
                                prohibited.
                            </p>
                            <p>
                                You may not sell or modify the content of this Website or reproduce, display, publicly
                                perform, distribute, or otherwise use the materials in any way for any public or
                                commercial purpose without the respective organization’s or entity’s written permission.
                            </p>
                        </section>

                        <div class="border-t border-dashed border-gray-200 dark:border-gray-700"></div>

                        <!-- Acceptable Website Use -->
                        <section id="acceptable-use" class="space-y-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white">
                                    02
                                </div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Acceptable Website Use
                                </h2>
                            </div>

                            <!-- Security Rules -->
                            <div class="space-y-2 rounded-xl bg-gray-50/80 dark:bg-gray-800/70 p-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    (A) Security Rules
                                </h3>
                                <p>
                                    Visitors are prohibited from violating or attempting to violate the security of the
                                    Website, including, without limitation:
                                </p>
                                <ul class="list-disc list-inside space-y-1 ml-2">
                                    <li>
                                        Accessing data not intended for such user or logging into a server or account
                                        which the user is not authorised to access.
                                    </li>
                                    <li>
                                        Attempting to probe, scan or test the vulnerability of a system or network or to
                                        breach security or authentication measures without proper authorisation.
                                    </li>
                                    <li>
                                        Attempting to interfere with service to any user, host or network, including,
                                        without limitation, via means of submitting a virus or "Trojan horse" to the
                                        Website, overloading, "flooding", "mail bombing" or "crashing".
                                    </li>
                                    <li>
                                        Sending unsolicited electronic mail, including promotions and/or advertising of
                                        products or services.
                                    </li>
                                </ul>
                                <p class="mt-1">
                                    Violations of system or network security may result in civil or criminal liability.
                                    The business and / or its associate entities will have the right to investigate
                                    occurrences that they suspect as involving such violations and will have the right
                                    to involve, and cooperate with, law enforcement authorities in prosecuting users who
                                    are involved in such violations.
                                </p>
                            </div>

                            <!-- General Rules -->
                            <div class="space-y-2 rounded-xl bg-gray-50/80 dark:bg-gray-800/70 p-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    (B) General Rules
                                </h3>
                                <p>
                                    Visitors may not use the Website in order to transmit, distribute, store or destroy
                                    material:
                                </p>
                                <ul class="list-disc list-inside space-y-1 ml-2">
                                    <li>
                                        That could constitute or encourage conduct that would be considered a criminal
                                        offence or violate any applicable law or regulation.
                                    </li>
                                    <li>
                                        In a manner that will infringe the copyright, trademark, trade secret or other
                                        intellectual property rights of others or violate the privacy or publicity rights
                                        of others.
                                    </li>
                                    <li>
                                        That is libellous, defamatory, pornographic, profane, obscene, threatening,
                                        abusive or hateful.
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <div class="border-t border-dashed border-gray-200 dark:border-gray-700"></div>

                        <!-- Indemnity -->
                        <section id="indemnity" class="space-y-3">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white">
                                    03
                                </div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Indemnity
                                </h2>
                            </div>
                            <p>
                                The User unilaterally agrees to indemnify and hold harmless, without objection, the
                                Company, its officers, directors, employees and agents from and against any claims,
                                actions, demands, liabilities, losses and damages whatsoever arising from or resulting
                                from their use of or their breach of the
                                <span class="font-medium">https://www.cadadda.com/</span> terms.
                            </p>
                        </section>

                        <div class="border-t border-dashed border-gray-200 dark:border-gray-700"></div>

                        <!-- Liability -->
                        <section id="liability" class="space-y-3">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white">
                                    04
                                </div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Liability
                                </h2>
                            </div>
                            <p>
                                User agrees that neither the Company nor its group companies, directors, officers or
                                employees shall be liable for any direct, indirect, incidental, special, consequential
                                or exemplary damages, resulting from:
                            </p>
                            <ul class="list-disc list-inside space-y-1 ml-2">
                                <li>The use or the inability to use the service.</li>
                                <li>The cost of procurement of substitute goods or services.</li>
                                <li>
                                    Any goods, data, information or services purchased or obtained or messages received
                                    or transactions entered into through or from the service.
                                </li>
                                <li>Unauthorized access to or alteration of user's transmissions or data.</li>
                                <li>
                                    Any other matter relating to the service, including but not limited to, damages for
                                    loss of profits, use, data or other intangibles.
                                </li>
                            </ul>
                            <p>
                                User further agrees that Company shall not be liable for any damages arising from
                                interruption, suspension or termination of service, whether such interruption,
                                suspension or termination was justified or not, negligent or intentional, inadvertent or
                                advertent.
                            </p>
                            <p>
                                In no event shall Company's total liability to the User for all damages, losses or
                                causes of action exceed the amount paid by the User to Company, if any, that is related
                                to the cause of action.
                            </p>
                        </section>

                        <div class="border-t border-dashed border-gray-200 dark:border-gray-700"></div>

                        <!-- Disclaimer -->
                        <section id="disclaimer" class="space-y-3 pb-2">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white">
                                    05
                                </div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Disclaimer of Consequential Damages
                                </h2>
                            </div>
                            <p>
                                In no event shall Company or any parties, organizations or entities associated with the
                                corporate brand name “us” or otherwise, mentioned on this Website, be liable for any
                                damages whatsoever (including, without limitations, incidental and consequential
                                damages, lost profits, or damage to computer hardware or loss of data information or
                                business interruption) resulting from the use or inability to use the Website and the
                                Website material, whether based on warranty, contract, tort, or any other legal theory,
                                and whether or not such organizations or entities were advised of the possibility of such
                                damages.
                            </p>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- ========= END TERMS PAGE UI ========= -->

    <!-- Footer -->
    <footer class="bg-gray-900 dark:bg-black text-white pt-16 pb-8 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <!-- Company Info -->
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-700 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-lg">C</span>
                        </div>
                        <span class="text-2xl font-bold">CADADDA</span>
                    </div>
                    <p class="text-gray-400 mb-4">
                        Autodesk Authorized CAD/CAM Training Institute providing industry-standard education since 2017.
                    </p>
                    <div class="flex space-x-4">
                        <!-- social icons same as before -->
                        <!-- ... (aapka existing social links yaha already sahi hain, unhe waise hi rehne dein) -->
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Our Courses</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Admission Process</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Student Portal</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Careers</a></li>
                    </ul>
                </div>

                <!-- Courses -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Popular Courses</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">AutoCAD</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">3DS Max</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Revit Architecture</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">SolidWorks</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Interior Design</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Contact Us</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-gray-400">
                                PL No-8, Behind Mahaveer Complex, Opp. Bheru Bagh Jain Mandir, C road, Sardarpura,
                                Jodhpur, Rajasthan, 342001
                            </span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-blue-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span class="text-gray-400">9261077888</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-blue-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-gray-400">
                                <a href="mailto:info@cadadda.com">info@cadadda.com</a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-gray-800 dark:border-gray-700 pt-6 mt-6">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-gray-400 text-xs sm:text-sm">
                        © 2025 CADADDA. All rights reserved. | Autodesk Authorized Training Institute
                    </p>
                    <div class="flex flex-wrap gap-4 text-xs sm:text-sm">
                        <a href="{{ route('privacy.policy') }}" class="text-gray-400 hover:text-white">
                            Privacy Policy
                        </a>

                        <a href="{{ route('terms.conditions') }}" class="text-gray-400 hover:text-white">
                            Terms of Service
                        </a>

                        <a href="#" class="text-gray-400 hover:text-white transition-colors">Refund Policy</a>
                    </div>
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