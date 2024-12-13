<nav aria-label="Sidebar Navigation" class="peer-checked:left-0 z-10 flex h-screen flex-col overflow-hidden bg-sidebar-dark text-white transition-all" x-data="{ open: true, collapsed: false }" :class="{ 'w-18': collapsed, 'w-60': !collapsed }">
    <ul class="flex flex-col h-full mt-8 space-y-3 md:mt-20">
        <!-- Burger Icon Button to toggle sidebar collapse -->
        <button @click="collapsed = !collapsed" class="absolute top-4 right-4 flex justify-end items-center space-x-2">
            <x-solar-hamburger-menu-outline class="w-5 h-5" />
        </button>

        <!-- Dashboard Link -->
        <li class="relative">
            <a href="/" class="focus:bg-sidebar-dark-extra-light hover:bg-sidebar-dark-extra-light flex items-center w-full space-x-2 rounded-md px-10 py-2 text-gray-300 focus:outline-none">
                {{ svg('ri-dashboard-horizontal-fill', 'w-5 h-5 mr-2') }}
                <span x-show="!collapsed">Dashboard</span>
            </a>
        </li>

        <!-- User Management Section -->
        <li class="relative" x-data="{ openUserManagement: false }">
            <button
                @click="openUserManagement = !openUserManagement"
                type="button"
                class="focus:bg-sidebar-dark-extra-light hover:bg-gray-700 hover:shadow-md flex items-center w-full space-x-2 rounded-md px-10 py-2 text-gray-300 focus:outline-none transition-all duration-200 ease-in-out"
            >
                <span><x-heroicon-o-user-group class="w-5 h-5" /></span>
                <!-- Text only visible when sidebar is expanded -->
                <span x-show="!collapsed" class="ml-2">Gebruikersbeheer</span>

                <!-- Chevrons for expanded/collapsed state -->
                <template x-if="!openUserManagement">
                    <x-heroicon-o-chevron-down x-show="!collapsed" class="w-5 h-5 flex-shrink-0 transition-transform duration-200" />
                </template>
                <template x-if="openUserManagement">
                    <x-heroicon-o-chevron-up x-show="!collapsed" class="w-5 h-5 flex-shrink-0 transition-transform duration-200" />
                </template>
            </button>

            <!-- Dropdown menu -->
            <ul
                class="py-2 space-y-2"
                x-show="openUserManagement"
                x-transition
                :class="openUserManagement ? 'bg-sidebar-dark-extra-light' : 'bg-primary'"
            >
                <li class="relative">
                    <a
                        href="/"
                        class="focus:bg-sidebar-dark-extra-light hover:bg-sidebar-dark-light flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none"
                    >
                        <x-phosphor-tree-view-duotone class="w-5 h-5 mr-2" />
                        <span x-show="!collapsed">Overzicht</span>
                    </a>
                </li>
                <li class="relative">
                    <a
                        href="/"
                        class="focus:bg-sidebar-dark-extra-light hover:bg-sidebar-dark-light flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none"
                    >
                        <x-phosphor-list-bullets-duotone class="w-5 h-5 mr-2" />
                        <span x-show="!collapsed">Lijsten</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Laptop Tool Section -->
        <li class="relative" x-data="{ openLaptoptool: false }">
            <!-- Button -->
            <button @click="openLaptoptool = !openLaptoptool" type="button"
                    class="focus:bg-sidebar-dark-extra-light hover:bg-gray-700 hover:shadow-md flex items-center w-full space-x-2 rounded-md px-10 py-2 text-gray-300 focus:outline-none transition-all duration-200 ease-in-out">
                <x-phosphor-laptop-duotone class="w-5 h-5" />
                <span x-show="!collapsed">Laptoptool</span>
                <template x-if="!openLaptoptool">
                    <x-heroicon-o-chevron-down x-show="!collapsed"
                                               class="w-5 h-5 flex-shrink-0 transition-transform duration-200 ease-out" />
                </template>
                <template x-if="openLaptoptool">
                    <x-heroicon-o-chevron-up x-show="!collapsed"
                                             class="w-5 h-5 flex-shrink-0 transition-transform duration-200 ease-in" />
                </template>
            </button>

            <!-- Dropdown -->
            <ul class="py-2 space-y-0 overflow-hidden"
                x-show="openLaptoptool"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 -translate-y-2 scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                x-transition:leave-end="opacity-0 -translate-y-2 scale-95"
                :class="openLaptoptool ? 'bg-sidebar-dark-extra-light' : 'bg-primary'">

                <!-- Dropdown Links -->
                <li class="relative">
                    <a href="/"
                       class="focus:bg-sidebar-dark-extra-light hover:bg-sidebar-dark-light hover:shadow-md flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 transition-all duration-200 ease-in-out">
                        <x-phosphor-laptop-duotone class="w-5 h-5 mr-2" />
                        <span x-show="!collapsed">Toestellen</span>
                    </a>
                </li>
                <li class="relative">
                    <a href="/"
                       class="focus:bg-sidebar-dark-extra-light hover:bg-sidebar-dark-light hover:shadow-md flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 transition-all duration-200 ease-in-out">
                        <x-phosphor-trademark-registered-duotone class="w-5 h-5 mr-2" />
                        <span x-show="!collapsed">Registraties</span>
                    </a>
                </li>
                <li class="relative">
                    <a href="/"
                       class="focus:bg-sidebar-dark-extra-light hover:bg-sidebar-dark-light hover:shadow-md flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 transition-all duration-200 ease-in-out">
                        <x-phosphor-list-bullets-duotone class="w-5 h-5 mr-2" />
                        <span x-show="!collapsed">Lijsten</span>
                    </a>
                </li>
            </ul>
        </li>


        <!-- Sollicitanten Link -->
        <li class="relative">
            <a href="/" class="focus:bg-sidebar-dark-extra-light hover:bg-sidebar-dark-extra-light flex items-center w-full space-x-2 rounded-md px-10 py-2 text-gray-300 focus:outline-none">
                <x-heroicon-o-document-text class="w-5 h-5" />
                <span x-show="!collapsed">Sollicitanten</span>
            </a>
        </li>

        <!-- Plusuren Section -->
        <li class="relative" x-data="{ openAdditionalHours: false }">
            <button @click="openAdditionalHours = !openAdditionalHours" type="button" class="focus:bg-sidebar-dark-extra-light hover:bg-sidebar-dark-extra-light flex items-center w-full space-x-2 rounded-md px-10 py-2 text-gray-300 focus:outline-none">
                <x-phosphor-clock class="w-5 h-5" />
                <span x-show="!collapsed">Plusuren</span>
                <template x-if="!openAdditionalHours">
                    <x-heroicon-o-chevron-down x-show="!collapsed" class="w-5 h-5 flex-shrink-0 transition-transform duration-200" />
                </template>
                <template x-if="openAdditionalHours">
                    <x-heroicon-o-chevron-up x-show="!collapsed" class="w-5 h-5 flex-shrink-0 transition-transform duration-200" />
                </template>
            </button>
            <ul class="py-2 space-y-2" x-show="openAdditionalHours" x-transition :class="openAdditionalHours ? 'bg-sidebar-dark-extra-light' : 'bg-primary'">
                <li class="relative">
                    <a href="/" class="focus:bg-sidebar-dark-extra-light hover:bg-sidebar-dark-light flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                        <x-phosphor-pencil class="w-5 h-5 mr-2" />
                        <span x-show="!collapsed">Registratie</span>
                    </a>
                </li>
                <li class="relative">
                    <a href="/" class="focus:bg-sidebar-dark-extra-light hover:bg-sidebar-dark-light flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                        <x-heroicon-o-cog class="w-5 h-5 mr-2" />
                        <span x-show="!collapsed">Beheer</span>
                    </a>
                </li>
                <li class="relative">
                    <a href="/" class="focus:bg-sidebar-dark-extra-light hover:bg-sidebar-dark-light flex items-center w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                        <x-phosphor-layout class="w-5 h-5 mr-2" />
                        <span x-show="!collapsed">Overzicht</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Profile Section (at the bottom) -->
    <div class="flex-shrink-0 flex flex-col items-center justify-end pb-4">
        <!-- Expanded Sidebar -->
        <div x-show="!collapsed" class="text-gray-300 text-sm">
            Murrel Venlo
        </div>

        <!-- Collapsed Sidebar (Avatar) -->
        <img x-show="collapsed"
             :src="'https://ui-avatars.com/api/?name=' + encodeURIComponent('Murrel Venlo')"
             alt="Murrel Venlo"
             class="w-8 h-8 rounded-full" />
    </div>
</nav>
