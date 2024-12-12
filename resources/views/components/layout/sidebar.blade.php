<nav aria-label="Sidebar Navigation" class="peer-checked:w-64 left-0 z-10 flex h-screen w-0 flex-col overflow-hidden bg-sidebar-dark text-white transition-all md:h-screen md:w-64 lg:w-72">
{{--    <div class="mt-4 py-3 pl-10 md:mt-10 bg-white">--}}
{{--        --}}{{--        <span class="mr-1 inline-flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 align-bottom text-2xl font-bold">U</span>--}}
{{--        <img src="{{ asset('/assets/logos/KogekaLogo_landscape_colour_cmyk 12.jpg') }}" alt="Logo" class="w-auto h-20 bg-primary">--}}
{{--    </div>--}}
    {{--    <ul class="mt-8 space-y-3 md:mt-20">--}}
    <ul class="flex flex-col h-full mt-8 space-y-3 md:mt-20">
        <li class="relative">
            <a href="/" class="focus:bg-slate-600 hover:bg-slate-600 flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                {{ svg('ri-dashboard-horizontal-fill', 'w-5 h-5 mr-2') }}
                <span>Dasboard</span>
            </a>
        </li>
{{--        <li class="relative">--}}
{{--            <a href="#" class="flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">--}}
{{--                <i class=''></i>--}}
{{--                <span class="link_name">Dashboard</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="relative" x-data="{ openUserManagement: false }">--}}
{{--            <a href="#"--}}
{{--               class="flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none"--}}
{{--               @click="openUserManagement = !openUserManagement">--}}
{{--                <i class=''></i>--}}
{{--                <span class="link_name">Gebruikersbeheer</span>--}}
{{--            </a>--}}
{{--            <ul class="sub-menu bg-footer-background relative space-x-2 left-0 w-full px-10"--}}
{{--                x-show="openUserManagement"--}}
{{--                x-transition:enter="transition ease-out duration-200"--}}
{{--                x-transition:enter-start="opacity-0 scale-95"--}}
{{--                x-transition:enter-end="opacity-100 scale-100"--}}
{{--                x-transition:leave="transition ease-in duration-150"--}}
{{--                x-transition:leave-start="opacity-100 scale-100"--}}
{{--                x-transition:leave-end="opacity-0 scale-95"--}}
{{--                x-cloak>--}}
{{--                <li><a href="#">Overzicht</a></li>--}}
{{--                <li><a href="#">Lijsten</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
        <li class="relative" x-data="{ openUserManagement: false }">
            <button
                @click="openUserManagement = !openUserManagement"
                type="button"
                class="focus:bg-slate-600 hover:bg-sidebar-dark-light flex items-center w-full space-x-2 rounded-md px-10 py-2 text-gray-300 focus:outline-none"
                >
                <span x-show="open" class="">
                    Gebruikersbeheer</span>
                <template x-if="!openUserManagement">
                    <x-heroicon-o-chevron-down class="w-5 h-5 flex-shrink-0 transition-transform duration-200" />
                </template>
                <template x-if="openUserManagement">
                    <x-heroicon-o-chevron-up class="w-5 h-5 flex-shrink-0 transition-transform duration-200" />
                </template>
            </button>
            <ul class="py-2 space-y-2" x-show="openUserManagement" x-transition  :class="openUserManagement ? 'bg-sidebar-dark-light' : 'bg-primary'">
                <li class="relative">
                    <a href="/" class="focus:bg-slate-600 hover:bg-primary flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                        <x-phosphor-tree-view-duotone class="w-5 h-5 mr-2" />
                        Overzicht</a>
                </li>
                <li class="relative">
                    <a href="/" class="focus:bg-slate-600 hover:bg-primary flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                        <x-phosphor-list-bullets-duotone class="w-5 h-5 mr-2" />
                        Lijsten</a>
                </li>
            </ul>
        </li>
            <li class="relative" x-data="{ openLaptoptool: false }">
            <button
                @click="openLaptoptool = !openLaptoptool"
                type="button"
                class="focus:bg-slate-600 hover:bg-sidebar-dark-light flex items-center w-full space-x-2 rounded-md px-10 py-2 text-gray-300 focus:outline-none">
                <span x-show="open" class="">Laptoptool</span>
                <template x-if="!openLaptoptool">
                    <x-heroicon-o-chevron-down class="w-5 h-5 flex-shrink-0 transition-transform duration-200" />
                </template>
                <template x-if="openLaptoptool">
                    <x-heroicon-o-chevron-up class="w-5 h-5 flex-shrink-0 transition-transform duration-200" />
                </template>
            </button>
            <ul class="py-2 space-y-2" x-show="openLaptoptool" x-transition  :class="openLaptoptool ? 'bg-sidebar-dark-light' : 'bg-primary'">
                <li class="relative">
                    <a href="/" class="focus:bg-slate-600 hover:bg-primary flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                        <x-phosphor-laptop-duotone class="w-5 h-5 mr-2" />
                        Toestellen</a>
                </li>
                <li class="relative">
                    <a href="/" class="focus:bg-slate-600 hover:bg-primary flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                        <x-phosphor-trademark-registered-duotone class="w-5 h-5 mr-2" />
                        Registraties</a>
                </li>
                <li class="relative">
                    <a href="/" class="focus:bg-slate-600 hover:bg-primary flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                        <x-phosphor-list-bullets-duotone class="w-5 h-5 mr-2" />
                        Lijsten</a>
                </li>
            </ul>
        </li>
            <li class="relative">
                <a href="/" class="focus:bg-slate-600 hover:bg-slate-600 flex items-center w-full space-x-2 rounded-md px-10 py-2 text-gray-300 focus:outline-none">
                    <i class="fas fa-users mr-2" :class="{'mr-2': open, 'mx-auto': !open, 'text-sm': !open}"></i>
                    <span x-show="open">Personen</span>
                </a>
            </li>
            <li class="relative">
                <a href="/" class="focus:bg-slate-600 hover:bg-slate-600 flex items-center w-full space-x-2 rounded-md px-10 py-2 text-gray-300 focus:outline-none">
                    <i class="fas fa-lock mr-2" :class="{'mr-2': open, 'mx-auto': !open, 'text-sm': !open}"></i>
                    <span x-show="open">Sleutels</span>
                </a>
            </li>
            <li class="relative !mb-9">
                <a href="/" class="focus:bg-slate-600 hover:bg-slate-600 flex items-center w-full space-x-2 rounded-md px-10 py-2 text-gray-300 focus:outline-none">
                    <i class="fas fa-lock mr-2" :class="{'mr-2': open, 'mx-auto': !open, 'text-sm': !open}"></i>
                    <span x-show="open">Lokalen</span>
                </a>
            </li>
            <li class="relative !mt-14" x-data="{ openProfile: false }">
                <button
                    @click="openProfile = !openProfile"
                    type="button"
                    class="focus:bg-slate-600 hover:bg-slate-600 flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none"
                    aria-controls="dropdown-example"
                    data-collapse-toggle="dropdown-example">
                    <span x-show="open">Gebruikersbeheer</span>
                    <!-- Icon for toggling -->
                    <svg sidebar-toggle-item class="w-6 h-6"
                         fill="currentColor"
                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul class="py-2 space-y-2" x-show="openProfile" x-transition  :class="openProfile ? 'bg-secondary' : 'bg-primary'">
                    <li class="relative">
                        <a href="/" class="focus:bg-slate-600 hover:bg-primary flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                            {{ svg('ri-dashboard-horizontal-fill', 'w-5 h-5 mr-2') }}
                            Dashboard</a>
                    </li>
                    <li class="relative">
                        <a href="{{ route('profile.show') }}" class="focus:bg-slate-600 hover:bg-primary flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                            {{ svg('iconsax-bul-profile-tick', 'w-5 h-5 mr-2') }}
                            Profiel bijwerken</a>
                    </li>
                    <li class="relative"><form method="POST" action="/">
                            @csrf
                            <a href="/" class="focus:bg-slate-600  hover:bg-primary flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                                {{ svg('ri-logout-circle-r-line', 'w-5 h-5 mr-2') }}
                                Afmelden</a>
                        </form>
                    </li>
                </ul>
            </li>



            <!-- Conditionally render the login and logout buttons -->
            {{--        @guest--}}
            {{--            <li class="mt-auto">--}}
            {{--                <a href="{{ route('login') }}" class="focus:bg-slate-600 hover:bg-slate-600 flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">--}}
            {{--                    <i class="fas fa-sign-in-alt mr-2" :class="{'mr-2': open, 'mx-auto': !open, 'text-sm': !open}"></i>--}}
            {{--                    <span x-show="open">Aanmelden</span>--}}
            {{--                </a>--}}
            {{--            </li>--}}
            {{--        @endguest--}}
            {{--        end part two--}}
    </ul>

</nav>
