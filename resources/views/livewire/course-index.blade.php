<div>
    <div class="bg-gray-200 py-4 mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class="focus:outline-none bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4" wire:click="resetFilters">
                <i class="fa-solid fa-layer-group text-xs mr-2"></i>
                Todos los cursos
            </button>

            <!-- Dropdown Categorias -->
            <div x-data="{ dropdownOpen: false }" class="relative mr-4">
                <button @click="dropdownOpen = !dropdownOpen"
                    class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 relative z-10 flex items-center focus:outline-none">
                    <svg class="h-5 w-5 text-gray-800 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                    Categorías
                </button>

                <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10">
                </div>

                <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                    @foreach ($categories as $category)
                        <a
                            class="cursor-pointer block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white"
                            wire:click="$set('category_id', {{ $category->id }})" x-on:click="dropdownOpen = false">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Dropdown Niveles -->
            <div x-data="{ dropdownOpen: false }" class="relative">
                <button @click="dropdownOpen = !dropdownOpen"
                    class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 relative z-10 flex items-center focus:outline-none">
                    <svg class="h-5 w-5 text-gray-800 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 10h16M4 14h16M4 18h16M4 6h16" />
                    </svg>
                    Niveles
                </button>

                <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10">
                </div>

                <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                    @foreach ($levels as $level)
                        <a
                            class="cursor-pointer block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white"
                            wire:click="$set('level_id', {{ $level->id }})" x-on:click="dropdownOpen = false">
                            {{ $level->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <p>Category_id: {{$category_id}}</p>
    <p>Level_Id: {{$level_id}}</p>

    <div
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        @foreach ($courses as $course)
            <x-course-card :course="$course" />
        @endforeach
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{ $courses->links() }}
    </div>
</div>
