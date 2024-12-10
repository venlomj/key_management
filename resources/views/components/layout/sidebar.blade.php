<nav aria-label="Sidebar Navigation" class="peer-checked:w-64 left-0 z-10 flex h-screen w-0 flex-col overflow-hidden bg-sidebar-dark text-white transition-all md:h-screen md:w-64 lg:w-72">
{{--    <div class="mt-4 py-3 pl-10 md:mt-10 bg-white">--}}
{{--        --}}{{--        <span class="mr-1 inline-flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 align-bottom text-2xl font-bold">U</span>--}}
{{--        <img src="{{ asset('/assets/logos/KogekaLogo_landscape_colour_cmyk 12.jpg') }}" alt="Logo" class="w-auto h-20 bg-primary">--}}
{{--    </div>--}}
    {{--    <ul class="mt-8 space-y-3 md:mt-20">--}}
    <ul class="flex flex-col h-full mt-8 space-y-3 md:mt-20">
        {{--        part one--}}
        @auth
            <li class="relative">
                <a href="/" class="focus:bg-slate-600 hover:bg-slate-600 flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                    <i class="fas fa-users mr-2" :class="{'mr-2': open, 'mx-auto': !open, 'text-sm': !open}"></i>
                    <span x-show="open">Personen</span>
                </a>
            </li>
            <li class="relative">
                <a href="/" class="focus:bg-slate-600 hover:bg-slate-600 flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                    <i class="fas fa-lock mr-2" :class="{'mr-2': open, 'mx-auto': !open, 'text-sm': !open}"></i>
                    <span x-show="open">Sleutels</span>
                </a>
            </li>
            <li class="relative !mb-9">
                <a href="/" class="focus:bg-slate-600 hover:bg-slate-600 flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                    <i class="fas fa-lock mr-2" :class="{'mr-2': open, 'mx-auto': !open, 'text-sm': !open}"></i>
                    <span x-show="open">Lokalen</span>
                </a>
            </li>
            {{--        end part one--}}
            {{--        part two--}}
            <li class="relative !mt-14" x-data="{ openProfile: false }">
                <button
                    @click="openProfile = !openProfile"
                    type="button"
                    class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-example"
                    data-collapse-toggle="dropdown-example">
                    <span>@livewire('partials.avatar')</span>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">
                @livewire('partials.name')
        </span>

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
                @endauth
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
