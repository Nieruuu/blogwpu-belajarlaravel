<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <a href="/"
                        class="inline-flex items-center gap-3 rounded-full border border-white/10 bg-white/5 px-3 py-2 text-white">
                        <span class="grid size-8 place-items-center rounded-full bg-amber-400 text-sm font-black text-slate-900">
                            W
                        </span>
                        <span class="text-sm font-semibold tracking-[0.24em] uppercase">WPublog</span>
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                        <x-my-nav-link href="/" :current="request()->routeIs('home') || request()->is('home')">Home</x-my-nav-link>
                        <x-my-nav-link href="{{ route('blog.index') }}" :current="request()->is('blog') || request()->is('posts')">Blog</x-my-nav-link>
                        <x-my-nav-link href="{{ route('dashboard') }}" :current="request()->is('dashboard') || request()->is('dashboard/*')">Dashboard</x-my-nav-link>
                        <x-my-nav-link href="/about" :current="request()->is('about')">About</x-my-nav-link>
                        <x-my-nav-link href="/contact" :current="request()->is('contact')">Contact</x-my-nav-link>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">


                    <!-- Profile dropdown -->
                    <div class="relative ml-3" id="profile-dropdown-container">
                        <div
                            class="hover:bg-white/5 rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            @if (Auth::check())
                                <button type="button" id="profile-menu-button"
                                    class="relative cursor-pointer flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
                                    aria-expanded="false" aria-haspopup="true">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
                                    <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('img/sbcf-default-avatar.webp') }}"
                                        alt="{{ Auth::user()->name }}"
                                        class="size-8 rounded-full outline -outline-offset-1 outline-white/10" />

                                    <div class="ml-2 text-sm font-medium text-gray-300 hover:text-white">
                                        {{ Auth::user()->name }}</div>

                                    <div class="ms-1 text-gray-400 group-hover:text-gray-300">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>

                                </button>
                            @else
                                <a href="/login"
                                    class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
                                <span class="text-gray-300 px-1">|</span>
                                <a href="/register"
                                    class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>
                            @endif
                        </div>
                        <!-- Dropdown menu -->
                        <div id="profile-dropdown"
                            class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="profile-menu-button"
                            tabindex="-1">
                            <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Your profile</a>
                            <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Settings</a>
                            <form method="POST" action="/logout">
                                @csrf
                                <button type="submit"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer w-full text-left"
                                    role="menuitem">Log out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" id="mobile-menu-button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500"
                    aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed -->
                    <svg id="icon-menu-closed" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                        <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <!-- Icon when menu is open -->
                    <svg id="icon-menu-open" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        data-slot="icon" aria-hidden="true" class="size-6 hidden">
                        <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
            <x-my-nav-link class="block" href="/" :current="request()->routeIs('home') || request()->is('home')">Home</x-my-nav-link>
            <x-my-nav-link class="block" href="{{ route('blog.index') }}" :current="request()->is('blog') || request()->is('posts')">Blog</x-my-nav-link>
            <x-my-nav-link class="block" href="{{ route('dashboard') }}" :current="request()->is('dashboard') || request()->is('dashboard/*')">Dashboard</x-my-nav-link>
            <x-my-nav-link class="block" href="/about" :current="request()->is('about')">About</x-my-nav-link>
            <x-my-nav-link class="block" href="/contact" :current="request()->is('contact')">Contact</x-my-nav-link>
        </div>
        <div class="border-t border-white/10 pt-4 pb-3">
            @if (Auth::check())
                <div class="flex items-center px-5">
                    <div class="shrink-0">
                        <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('img/sbcf-default-avatar.webp') }}"
                            alt="{{ Auth::user()->name }}"
                            class="size-10 rounded-full outline -outline-offset-1 outline-white/10" />
                    </div>
                    <div class="ml-3">
                        <div class="text-base/5 font-medium text-white">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email }}</div>
                    </div>
                    <button type="button"
                        class="relative ml-auto shrink-0 rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            data-slot="icon" aria-hidden="true" class="size-6">
                            <path
                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                <div class="mt-3 space-y-1 px-2">
                    <a href="/profile"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Your
                        profile</a>
                    <a href="/dashboard"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Settings</a>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit"
                            class="block w-full text-left rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Log
                            out</button>
                    </form>
                </div>
            @else
                <div class="flex items-center px-5">
                    <a href="/login"
                        class="text-gray-300 hover:bg-white/5 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
                    <span class="text-gray-300 px-1">|</span>
                    <a href="/register"
                        class="text-gray-300 hover:bg-white/5 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>
                </div>
            @endif
        </div>
    </div>
</nav>

<script>
    // Profile dropdown toggle
    const profileButton = document.getElementById('profile-menu-button');
    const profileDropdown = document.getElementById('profile-dropdown');

    if (profileButton && profileDropdown) {
        profileButton.addEventListener('click', function(e) {
            e.stopPropagation();
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            profileDropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!profileButton.contains(e.target) && !profileDropdown.contains(e.target)) {
                profileButton.setAttribute('aria-expanded', 'false');
                profileDropdown.classList.add('hidden');
            }
        });
    }

    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const iconMenuClosed = document.getElementById('icon-menu-closed');
    const iconMenuOpen = document.getElementById('icon-menu-open');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            mobileMenu.classList.toggle('hidden');
            iconMenuClosed.classList.toggle('hidden');
            iconMenuOpen.classList.toggle('hidden');
        });
    }
</script>
