<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy | CADADDA</title>
    <script src="https://cdn.tailwindcss.com/3.4.1"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {}
            }
        }
    </script>
</head>

<body class="bg-gray-50 dark:bg-gray-950 transition-colors duration-300">
    <!-- ===== NAVBAR (same style as other pages) ===== -->
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

    <!-- ========= PRIVACY POLICY CONTENT ========= -->
    <main class="relative">
        <div
            class="pointer-events-none absolute inset-0 bg-gradient-to-b from-blue-50 via-gray-50 to-white dark:from-blue-950 dark:via-gray-950 dark:to-black/90">
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
                        <span class="text-gray-700 dark:text-gray-200 font-semibold">Privacy Policy</span>
                    </nav>
                    <div>
                        <h1
                            class="text-3xl sm:text-4xl font-bold tracking-tight text-gray-900 dark:text-white flex items-center gap-3">
                            Privacy Policy
                            <span
                                class="inline-flex items-center rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 dark:border-emerald-500/40 dark:bg-emerald-900/40 dark:text-emerald-200">
                                Last Updated • 2025
                            </span>
                        </h1>
                        <p class="mt-2 text-sm sm:text-base text-gray-600 dark:text-gray-400 max-w-2xl">
                            This policy explains how CADADDA collects, uses, stores and protects your personal
                            information when you use our website and services.
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <span
                        class="inline-flex items-center rounded-xl bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700 dark:bg-blue-900/40 dark:text-blue-200">
                        Compliant with IT Act, 2000
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
                        <a href="#intro"
                           class="block px-3 py-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-blue-50 hover:text-blue-700 dark:hover:bg-blue-900/40 dark:hover:text-blue-200">Overview</a>
                        <a href="#user-info"
                           class="block px-3 py-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-blue-50 hover:text-blue-700 dark:hover:bg-blue-900/40 dark:hover:text-blue-200">User Information</a>
                        <a href="#cookies"
                           class="block px-3 py-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-blue-50 hover:text-blue-700 dark:hover:bg-blue-900/40 dark:hover:text-blue-200">Cookies</a>
                        <a href="#links"
                           class="block px-3 py-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-blue-50 hover:text-blue-700 dark:hover:bg-blue-900/40 dark:hover:text-blue-200">Third-Party Links</a>
                        <a href="#sharing"
                           class="block px-3 py-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-blue-50 hover:text-blue-700 dark:hover:bg-blue-900/40 dark:hover:text-blue-200">Information Sharing</a>
                        <a href="#security"
                           class="block px-3 py-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-blue-50 hover:text-blue-700 dark:hover:bg-blue-900/40 dark:hover:text-blue-200">Information Security</a>
                        <a href="#grievance"
                           class="block px-3 py-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-blue-50 hover:text-blue-700 dark:hover:bg-blue-900/40 dark:hover:text-blue-200">Grievance Redressal</a>
                    </nav>
                </aside>

                <!-- Main text card -->
                <div
                    class="rounded-2xl border border-gray-200 dark:border-gray-800 bg-white/90 dark:bg-gray-900/90 shadow-md">
                    <div
                        class="px-5 sm:px-8 py-6 sm:py-8 space-y-8 text-sm sm:text-base leading-relaxed text-gray-700 dark:text-gray-200">

                        <!-- Intro -->
                        <section id="intro" class="space-y-3">
                            <p>
                                The terms <span class="font-semibold">"We" / "Us" / "Our" / “Company”</span>
                                individually and collectively refer to
                                <span class="font-semibold">CADADDA</span> and the terms
                                <span class="font-semibold">"You" / "Your" / "Yourself"</span> refer to the users.
                            </p>
                            <p>
                                This Privacy Policy is an electronic record in the form of an electronic contract formed
                                under the Information Technology Act, 2000 and the rules made thereunder, as amended
                                from time to time. This Privacy Policy does not require any physical, electronic or
                                digital signature.
                            </p>
                            <p>
                                This Privacy Policy is a legally binding document between you and CADADDA. The terms of
                                this Privacy Policy will be effective upon your acceptance (directly or indirectly in
                                electronic form, by clicking the “I accept” tab, by use of the Website, or by other
                                means) and will govern the relationship between you and CADADDA for your use of the
                                Website.
                            </p>
                            <p>
                                This document is published in accordance with the provisions of the Information
                                Technology (Reasonable Security Practices and Procedures and Sensitive Personal Data or
                                Information) Rules, 2011 under the Information Technology Act, 2000, which require
                                publishing of the Privacy Policy for collection, use, storage and transfer of sensitive
                                personal data or information.
                            </p>
                            <p>
                                By using the Website, you indicate that you understand, agree and consent to this
                                Privacy Policy. If you do not agree with the terms of this Privacy Policy, please do not
                                use this Website.
                            </p>
                            <p>
                                By providing us your information or by making use of the facilities provided by the
                                Website, you consent to the collection, storage, processing and transfer of your personal
                                and non-personal information by us as specified in this Privacy Policy. You further agree
                                that such collection, use, storage and transfer shall not cause any loss or wrongful gain
                                to you or any other person.
                            </p>
                        </section>

                        <div class="border-t border-dashed border-gray-200 dark:border-gray-700"></div>

                        <!-- USER INFORMATION -->
                        <section id="user-info" class="space-y-3">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white">
                                    01
                                </div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    User Information
                                </h2>
                            </div>
                            <p>
                                To avail certain services on our Website, users may be required to provide information
                                during the registration process, such as:
                            </p>
                            <ul class="list-disc list-inside space-y-1 ml-2">
                                <li>Name</li>
                                <li>Email address</li>
                                <li>Gender and age</li>
                                <li>PIN code / location</li>
                                <li>Credit / debit card details</li>
                                <li>Medical records and history</li>
                                <li>Sexual orientation</li>
                                <li>Biometric information</li>
                                <li>Password</li>
                                <li>Occupation, interests and other similar information</li>
                            </ul>
                            <p>
                                The information supplied by users enables us to improve our Website and provide you with
                                a more user-friendly experience. All required information is service-dependent and may be
                                used to maintain, protect and improve our services (including advertising services) and
                                for developing new services.
                            </p>
                            <p>
                                Information will not be considered sensitive if it is freely available and accessible in
                                the public domain, or is furnished under the Right to Information Act, 2005 or any other
                                law in force.
                            </p>
                        </section>

                        <div class="border-t border-dashed border-gray-200 dark:border-gray-700"></div>

                        <!-- COOKIES -->
                        <section id="cookies" class="space-y-3">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white">
                                    02
                                </div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Cookies
                                </h2>
                            </div>
                            <p>
                                To improve the responsiveness of the Website, we may use “cookies” or similar electronic
                                tools to collect information and assign each visitor a unique, random number as a User
                                Identification (User ID) to understand the user's individual interests using the
                                identified computer.
                            </p>
                            <p>
                                Unless you voluntarily identify yourself (for example, through registration), we will
                                not know who you are, even if a cookie is assigned to your computer. The only personal
                                information a cookie can contain is information you supply. A cookie cannot read data
                                from your hard drive.
                            </p>
                            <p>
                                Our advertisers may also assign their own cookies to your browser when you click on
                                their ads; this is a process we do not control.
                            </p>
                            <p>
                                Our web servers automatically collect limited information about your computer's
                                connection to the Internet (such as your IP address) when you visit our site. Your IP
                                address does not identify you personally. We use this information to deliver web pages
                                upon request, tailor our site to users’ interests, measure traffic within our site and
                                inform advertisers about the geographic locations of our visitors.
                            </p>
                        </section>

                        <div class="border-t border-dashed border-gray-200 dark:border-gray-700"></div>

                        <!-- LINKS -->
                        <section id="links" class="space-y-3">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white">
                                    03
                                </div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Links to Other Sites
                                </h2>
                            </div>
                            <p>
                                This Privacy Policy applies only to our own Website. Our site may provide links to other
                                websites that are beyond our control. We shall not be responsible in any way for your
                                use of such external sites or their privacy practices.
                            </p>
                        </section>

                        <div class="border-t border-dashed border-gray-200 dark:border-gray-700"></div>

                        <!-- INFORMATION SHARING -->
                        <section id="sharing" class="space-y-3">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white">
                                    04
                                </div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Information Sharing
                                </h2>
                            </div>
                            <p>
                                We share sensitive personal information with third parties only in the following limited
                                circumstances:
                            </p>
                            <ol class="list-decimal list-inside space-y-2 ml-2">
                                <li>
                                    <span class="font-semibold">Legal requirements:</span>
                                    When requested or required by law, court, governmental agency or authority for
                                    verification of identity, prevention, detection or investigation of offences
                                    (including cyber incidents), or for prosecution and punishment of offences. Such
                                    disclosures are made in good faith and in the belief that they are reasonably
                                    necessary for enforcing these terms and for complying with applicable laws and
                                    regulations.
                                </li>
                                <li>
                                    <span class="font-semibold">Group companies:</span>
                                    We may share information within our group companies and with their officers and
                                    employees for processing personal information on our behalf. We ensure that such
                                    recipients agree to process information based on our instructions and in compliance
                                    with this Privacy Policy and appropriate confidentiality and security measures.
                                </li>
                            </ol>
                        </section>

                        <div class="border-t border-dashed border-gray-200 dark:border-gray-700"></div>

                        <!-- INFORMATION SECURITY -->
                        <section id="security" class="space-y-3">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white">
                                    05
                                </div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Information Security
                                </h2>
                            </div>
                            <p>
                                We take appropriate security measures to protect against unauthorized access to,
                                alteration of, disclosure of or destruction of data. These include internal reviews of
                                our data collection, storage and processing practices and security measures, including
                                encryption and physical security safeguards to protect systems where we store personal
                                data.
                            </p>
                            <p>
                                All information gathered on our Website is stored within our controlled database. The
                                database is hosted on servers protected by a firewall, and access is password-protected
                                and strictly limited.
                            </p>
                            <p>
                                However, no security system is completely impenetrable. We cannot guarantee that our
                                database will never be compromised, nor can we guarantee that information you transmit
                                to us over the Internet will not be intercepted. Any information you include in public
                                postings or discussion areas is accessible to anyone with Internet access.
                            </p>
                            <p>
                                As the Internet evolves, we may update this Privacy Policy from time to time to reflect
                                necessary changes. Our use of any information will always be consistent with the policy
                                under which the information was collected, regardless of any changes to this policy.
                            </p>
                        </section>

                        <div class="border-t border-dashed border-gray-200 dark:border-gray-700"></div>

                        <!-- GRIEVANCE -->
                        <section id="grievance" class="space-y-3 pb-2">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white">
                                    06
                                </div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Grievance Redressal
                                </h2>
                            </div>
                            <p>
                                If you have any complaints, concerns, or questions regarding content, comments, or any
                                breach of these terms, you may contact our designated Grievance Officer using the
                                details below. Please send your complaint in writing or via email signed with your
                                electronic signature.
                            </p>
                            <div
                                class="mt-2 rounded-xl bg-gray-50 dark:bg-gray-800/80 p-4 text-sm space-y-1">
                                <p><span class="font-semibold">Grievance Officer:</span> Mr. Bhupesh Kumar</p>
                                <p><span class="font-semibold">Website:</span> www.cadadda.com</p>
                                <p><span class="font-semibold">Address:</span> CADADDA, PL-8, Behind Mahaveer Complex,
                                    Sardarpura, Jodhpur, Rajasthan, 342001</p>
                                <p><span class="font-semibold">Email:</span> <a href="mailto:info@cadadda.com"
                                        class="text-blue-600 dark:text-blue-300 underline">info@cadadda.com</a></p>
                                <p><span class="font-semibold">Phone:</span> +91-9261077888</p>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- ===== FOOTER (short version, adjust if needed) ===== -->
    <footer class="bg-gray-900 dark:bg-black text-white pt-10 pb-6 mt-6">
        <div class="container mx-auto px-4">
            <div class="border-t border-gray-800 dark:border-gray-700 pt-4 flex flex-col md:flex-row items-center justify-between gap-3">
                <p class="text-gray-400 text-xs sm:text-sm">
                    © 2025 CADADDA. All rights reserved. | Autodesk Authorized Training Institute
                </p>
                <div class="flex flex-wrap gap-4 text-xs sm:text-sm">
                    <a href="{{ url('/privacy-policy') }}" class="text-gray-400 hover:text-white">Privacy Policy</a>
                    <a href="{{ url('/terms-and-conditions') }}" class="text-gray-400 hover:text-white">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-white">Refund Policy</a>
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
