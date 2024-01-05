<header class="flex items-center justify-between py-10">
    <div>
        <a href="/" aria-label="idea-flow">
            <div class="flex items-center justify-between">
                <div class="mr-3">
                    <x-logo />
                </div>
                <div class="h-6 text-2xl font-semibold">
                    {{ config('app.name', 'Laravel') }}
                </div>
            </div>
        </a>
    </div>
    <div class="flex items-center space-x-4 leading-5 sm:space-x-6">
        @foreach (config('navmenu') as $menu)
            <a href="{{ route($menu['url']) }}" class="hidden font-medium text-gray-900 dark:text-gray-100 sm:block">
                {{ $menu['title'] }}
            </a>
        @endforeach
        <x-themeswitch />
        <x-mobilenav />
    </div>
</header>
