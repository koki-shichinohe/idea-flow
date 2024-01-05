<div class="flex flex-col items-start justify-start divide-y divide-gray-200 dark:divide-gray-700 md:mt-24 md:flex-row md:items-center md:justify-center md:space-x-6 md:divide-y-0">
    <div class="space-x-2 pb-8 pt-6 md:space-y-5">
        <h1 class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl sm:leading-10 md:border-r-2 md:px-6 md:text-6xl md:leading-14">
        Categories
        </h1>
    </div>
    <div class="flex max-w-lg flex-wrap">
        @if (blank($categories))
            'No categories found.'
        @else
            @foreach ($categories as $category)
                <div wire:key="category-{{ $category->id }}" class="mb-2 mr-5 mt-2">
                    <a
                      href={{ route('categories.show', ['category' => $category]) }}
                      class="mr-3 text-sm font-medium uppercase text-pink-500 hover:text-pink-600 dark:hover:text-pink-400"
                    >
                        {{ $category->name }}
                    </a>
                    <a
                      href={{ route('categories.show', ['category' => $category]) }}
                      class="-ml-2 text-sm font-semibold uppercase text-gray-600 dark:text-gray-300"
                    >
                    ({{ $category->posts_count }})
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</div>
