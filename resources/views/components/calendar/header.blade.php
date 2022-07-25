<header class="relative z-20 flex items-center justify-between border-b border-gray-200 py-4 px-6 lg:flex-none">
    <h1 class="text-lg font-semibold text-gray-900">
        <time id="current-datetime" datetime="{{ $year . '-' . $month . '-01' }}">{{ $monthLabel }} {{ $year }}</time>
    </h1>
    <div class="flex items-center">
        <div class="flex items-center rounded-md shadow-sm md:items-stretch">
            <button id="previous-month"
                    type="button"
                    class="flex items-center justify-center rounded-l-md border border-r-0 border-gray-300 bg-white py-2 pl-3 pr-4 text-gray-400 hover:text-gray-500 focus:relative md:w-9 md:px-2 md:hover:bg-gray-50">
                <span class="sr-only">Previous month</span>
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                     aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                          clip-rule="evenodd"/>
                </svg>
            </button>

            <button id="current-month"
                    type="button"
                    class="hidden border-t border-b border-gray-300 bg-white px-3.5 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900 focus:relative md:block">
                Current Month
            </button>

            <span class="relative -mx-px h-5 w-px bg-gray-300 md:hidden"></span>

            <button id="next-month"
                    type="button"
                    class="flex items-center justify-center rounded-r-md border border-l-0 border-gray-300 bg-white py-2 pl-4 pr-3 text-gray-400 hover:text-gray-500 focus:relative md:w-9 md:px-2 md:hover:bg-gray-50">
                <span class="sr-only">Next month</span>
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                     aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                          clip-rule="evenodd"/>
                </svg>
            </button>
        </div>
    </div>
</header>
