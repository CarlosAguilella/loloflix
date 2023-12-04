<nav x-data="{ open: false }" class="bg-black">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 sm:h-32 lg:h-16 items-center">
            <div class="flex-shrink-0">
                <a href="{{ route('index') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-white" />
                </a>
            </div>
            <div class="flex items-center flex-wrap">
                <!-- Logo -->

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex text-white">
                    <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                        {{ __('Index') }}
                    </x-nav-link>
                    <x-nav-link :href="route('films.index')" :active="request()->routeIs('films.index')">
                        {{ __('Films') }}
                    </x-nav-link>
                    <x-nav-link :href="route('films.likes.ver')" :active="request()->routeIs('films.likes.ver')">
                        {{ __('Likes') }}
                    </x-nav-link>
                    <x-nav-link :href="route('profile.monedero')" :active="request()->routeIs('profile.monedero')">
                        {{ Auth::user()->monedero }} {{ __('🪙') }}
                    </x-nav-link>
                </div>

                <!-- Search Box -->
                <div class="sm:flex-grow hidden sm:flex items-center">
                    <form action="{{ route('films.search') }}" method="GET" class="flex items-center">
                        <input type="text" name="search" placeholder="Ej: Apolonia y los 7 enanitos" class="rounded-l-lg p-2 border-t ml-4 mt-2 mr-0 border-b border-l text-gray-800 border-gray-200 bg-white dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700">
                        <button type="submit" class="px-6 rounded-r-lg bg-gray-400 text-gray-800 font-bold py-2 uppercase border-gray-500 border-t mt-2 border-b border-r dark:bg-gray-700 dark:text-gray-100 dark:border-gray-500">
                            <x-zondicon-search class="w-6"/>
                        </button>
                    </form>
                </div>
            </div>

            @auth
            <!-- Settings Dropdown -->
            <div class="flex items-center">
                <div class="sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-white focus:outline-none">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-white focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            @endauth
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-black">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('index')">
                {{ __('Index') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('films.index')" :active="request()->routeIs('films.index')">
                {{ __('Films') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('films.likes.ver')" :active="request()->routeIs('films.likes.ver')">
                {{ __('Likes') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('profile.monedero')" :active="request()->routeIs('profile.monedero')">
                {{ Auth::user()->monedero }} {{ __('🪙') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-800">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
