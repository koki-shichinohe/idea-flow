<div x-data="{ slideOverOpen: false }" class="relative z-50 w-auto h-auto">
    <button aria-label="Toggle Menu" @click="slideOverOpen=true" class="sm:hidden">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
            class="h-8 w-8 text-gray-900 dark:text-gray-100"
        >
            <path
                fillRule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clipRule="evenodd"
            />
        </svg>
    </button>
    <template x-teleport="body">
        <div 
            x-show="slideOverOpen"
            @keydown.window.escape="slideOverOpen=false"
            class="relative z-[99]"
        >
            <div x-show="slideOverOpen" x-transition.opacity.duration.600ms @click="slideOverOpen = false" class="fixed inset-0 bg-black bg-opacity-10"></div>
            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="fixed inset-y-0 right-0 flex max-w-full pl-10">
                        <div 
                            x-show="slideOverOpen" 
                            @click.away="slideOverOpen = false"
                            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700" 
                            x-transition:enter-start="translate-x-full" 
                            x-transition:enter-end="translate-x-0" 
                            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700" 
                            x-transition:leave-start="translate-x-0" 
                            x-transition:leave-end="translate-x-full" 
                            class="w-screen max-w-md"
                        >
                            <div class="flex flex-col h-full overflow-y-scroll bg-white opacity-95 shadow-lg dark:bg-gray-950 dark:opacity-[0.98]">
                                <div class="flex justify-end">
                                    <button class="mr-8 mt-11 h-8 w-8" aria-label="Toggle Menu" @click="slideOverOpen=false">
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        class="text-gray-900 dark:text-gray-100"
                                        >
                                            <path
                                                fillRule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clipRule="evenodd"
                                            />
                                        </svg>
                                    </button>
                                </div>
                                <nav class="fixed mt-8 h-full">
                                    @foreach (config('navmenu') as $menu)
                                        <div class="px-12 py-4">
                                            <a href="{{ route($menu['url']) }}" class="text-2xl font-bold tracking-widest text-gray-900 dark:text-gray-100">
                                                {{ $menu['title'] }}
                                            </a>
                                        </div>
                                    @endforeach
                                  </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
