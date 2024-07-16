<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <style>
        .menu-mob {
            display: none;
        }
    </style>
</head>

<body>
    <div>
        <nav class="bg-white shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-22">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 text-white">
                            <img src="./logo.png" alt="logo" style="height: 80px; width:80px">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a href="{{ route('productpage') }}"
                                    class="{{ request()->is('home') ? 'bg-gray-700 text-white' : '' }} text-gray-900 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <form action="{{ route('product.search') }}" method="GET">
                                <div class="flex">
                                    <input type="text" name="query" id="query" placeholder="Search products..."
                                        class="form-control">
                                    <button type="submit" class="btn btn-primary ml-2">Search</button>
                                </div>
                            </form>
                            <a href="{{ route('product.upload.form') }}" class="btn btn-danger ml-2">Upload Product</a>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button onclick="toggleMenu()" type="button"
                            class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg :class="{ 'hidden': open, 'block': !open }" class="block h-6 w-6"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg :class="{ 'hidden': !open, 'block': open }" class="hidden h-6 w-6"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        
            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="menu-mob" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="{{ route('productpage') }}"
                        class="{{ request()->is('home') ? 'bg-gray-700 text-white' : '' }} text-gray-900 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>
                </div>
                <div class="pb-3 border-t border-gray-700">
                    <form action="{{ route('product.search') }}" method="GET">
                        <div class="flex">
                            <input type="text" name="query" id="query" placeholder="Search products..."
                                class="form-control">
                            <button type="submit" class="btn btn-primary ml-2">Search</button>
                        </div>
                    </form>
                    <a href="{{ route('product.upload.form') }}" class="btn btn-danger mt-2">Upload Product</a>
                </div>
            </div>
        </nav>
        
        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 min-h-screen">
                <div>@yield('contents')</div>
            </div>
        </main>
    </div>
    <footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-between">
            <div class="w-full lg:w-1/2 mb-8 lg:mb-0">
                <h2 class="text-2xl font-bold mb-4">Swayamvara Wedding and Celebrity Management</h2>
                <p>Providing exceptional wedding and celebrity management services for over 2 years. Trust us to make your special day unforgettable.</p>
            </div>
            <div class="w-full lg:w-1/3 mb-8 lg:mb-0">
                <h3 class="text-xl font-semibold mb-4">Contact Us</h3>
                <ul>
                    <li>Address: Poovanamoodu, Alimukk</li>
                    <li>Phone: 7012706469</li>
                    <li>Address: Punalur, Chemmanthoor</li>
                    <li>Phone: 8281621761</li>
                    <li>General Phone: 6282973211</li>
                    <li>Email: <a href="mailto:swayamvarawedding@gmail.com" class="text-pink-500">swayamvarawedding@gmail.com</a></li>
                </ul>
            </div>
            <div class="w-full lg:w-1/3">
                <h3 class="text-xl font-semibold mb-4">Follow Us</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-pink-500 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-pink-500 hover:text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-pink-500 hover:text-white"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-pink-500 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-8 text-center">
            <p>&copy; 2024 Swayamvara Wedding and Celebrity Management. All rights reserved.</p>
        </div>
    </div>
</footer>

<script src="https://kit.fontawesome.com/9f4528f967.js" crossorigin="anonymous"></script>


    <script>
        function navbar() {
            return {
                open: false,
            }
        }

        let isOpenMenuOpen = true

        function toggleMenu() {
            if (isOpenMenuOpen) {
                document.querySelector('.menu-mob').style.display = 'block'
                isOpenMenuOpen = false
            } else {
                document.querySelector('.menu-mob').style.display = 'none'
                isOpenMenuOpen = true
            }
        }
    </script>
</body>

</html>
