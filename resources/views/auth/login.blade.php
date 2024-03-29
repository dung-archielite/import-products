<x-layouts.app>
    <div class="container mx-auto px-4 xl:max-w-6xl">
        <div class="flex flex-wrap -mx-4 flex-row">
            <div class="flex-shrink max-w-full px-4 w-full lg:w-1/2">
                <!-- login form -->
                <div class="max-w-full w-full px-2 sm:px-12 lg:pr-20 mb-12 lg:mb-0">
                    <div class="relative">
                        <div class="p-6 sm:py-8 sm:px-12 rounded-lg bg-white dark:bg-gray-800 shadow-xl">
                            <form id="login-form">
                                <div class="text-center">
                                    <h1 class="text-2xl leading-normal mb-3 font-bold text-gray-800 dark:text-gray-300 text-center">Welcome Back</h1>
                                </div>
                                <hr class="block w-12 h-0.5 mx-auto my-5 bg-gray-700 border-gray-700">
                                <div class="mb-6">
                                    <label for="inputemail" class="inline-block mb-2">Email</label>
                                    <input name="email" id="inputemail" class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-300 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600" value="" aria-label="email" type="email" required="">
                                </div>
                                <div class="mb-6">
                                    <div class="flex flex-wrap flex-row">
                                        <div class="flex-shrink max-w-full w-1/2">
                                            <label for="inputpass" class="inline-block mb-2">Password</label>
                                        </div>
                                        <div class="flex-shrink max-w-full w-1/2 ltr:text-right rtl:text-left">
                                            <a class="hover:text-blue-700" href="forgot-password.html">Forgot password?</a>
                                        </div>
                                    </div>
                                    <input id="inputpass" class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-300 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600" aria-label="password" type="password" value="" required="">
                                </div>
                                <div class="mb-6">
                                    <input class="form-checkbox h-5 w-5 text-indigo-500 dark:bg-gray-700 border border-gray-300 dark:border-gray-700 rounded focus:outline-none" type="checkbox" value="" id="remember" required>
                                    <label class="ltr:ml-2 rtl:mr-2" for="remember">
                                        Remember me
                                    </label>
                                </div>
                                <div class="grid">
                                    <button type="submit" class="py-2 px-4 inline-block text-center rounded leading-normal text-gray-100 bg-indigo-500 border border-indigo-500 hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block w-4 h-4 ltr:mr-2 rtl:ml-2 bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                        </svg>Login
                                    </button>
                                </div>
                            </form>
                            <div class="mt-4">
                                <p class="text-center mb-3"><span>Or</span></p>
                                <div class="text-center mb-6 sm:space-x-4">
                                    <a class="p-2 block sm:inline-block rounded lg:rounded-full leading-5 text-gray-100 bg-indigo-900 border border-indigo-900 hover:text-white hover:opacity-90 hover:ring-0 hover:border-indigo-900 focus:bg-indigo-900 focus:border-indigo-800 focus:outline-none focus:ring-0 mb-3" href="#">
                                        <!-- <i class="fab fa-facebook"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 mx-1" fill="currentColor" viewBox="0 0 512 512"><path d="M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z"/></svg>
                                        <span class="inline-block lg:hidden">Login with FB</span>
                                    </a>
                                    <a class="p-2 block sm:inline-block rounded lg:rounded-full leading-5 text-gray-100 bg-indigo-500 border border-indigo-500 hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0 mb-3" href="#">
                                        <!-- <i class="fab fa-twitter"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 mx-1" fill="currentColor" viewBox="0 0 512 512"><path d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z"/></svg>
                                        <span class="inline-block lg:hidden">Login with Twitter</span>
                                    </a>
                                </div>
                                <p class="text-center mb-0">Don't have an account? <a class="hover:text-indigo-500" href="register-ilustration.html">Register</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-shrink max-w-full px-4 w-full lg:w-1/2">
                <div class="text-center mt-6 lg:mt-0">
{{--                    <img src="../src/img/svg/meeting.svg" alt="welcome" class="max-w-full h-auto mx-auto">--}}
                    <div class="max-w-full h-auto mx-auto" content="{{ __('welcome') }}">
                        @include('components.svg.meeting')
                    </div>
                    <div class="px-4 mt-12">
                        <h1 class="text-bold text-4xl mb-2">Manage your business easily and safely</h1>
                        <p class="text-lg mb-4 text-gray-500">Managing a business is not as easy as it is today. You can view and manage all reports in a simple and practical way.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
