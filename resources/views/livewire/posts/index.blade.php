<div>
    <div class="pb-6 pt-6">
        <h1 class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:hidden sm:text-4xl sm:leading-10 md:text-6xl md:leading-14">
            All Posts
        </h1>
    </div>
    <div class="flex sm:space-x-24">
        <div class="hidden h-full max-h-screen min-w-[280px] max-w-[280px] flex-wrap overflow-auto rounded bg-gray-50 pt-5 shadow-md dark:bg-gray-900/70 dark:shadow-gray-800/40 sm:flex">
            <div class="px-6 py-4">
                <h3 class="font-bold uppercase text-pink-500">Categories</h3>
                <ul>
                    @foreach ($categories as $category)
                    <li wire:key={{ $category->id }} class="my-3">
                        @if ($category->posts_count < 1)
                        <h3 class="inline px-3 py-2 text-sm font-bold uppercase text-pink-500">
                            {{ "$category->name($category->posts_count)" }}
                        </h3>
                        @else
                        <a
                          href={{ route('categories.show', [ 'category' => $category ]) }}
                          class="px-3 py-2 text-sm font-medium uppercase text-gray-500 hover:text-pink-500 dark:text-gray-300 dark:hover:text-pink-500"
                          aria-label={{ "View posts categorized $category->name" }}>
                            {{ "$category->name($category->posts_count)" }}
                        </a>
                        @endif
                    </li>
                    @endforeach
                </ul>
                <h3 class="font-bold uppercase text-pink-500">Tags</h3>
                <ul>
                    @foreach ($tags as $tag)
                    <li wire:key={{ $tag->id }} class="my-3">
                        @if ($tag->posts_count < 1)
                        <h3 class="inline px-3 py-2 text-sm font-bold uppercase text-pink-500">
                            {{ "$tag->name($tag->posts_count)" }}
                        </h3>
                        @else
                        <a
                          href={{ route('tags.show', [ 'tag' => $tag ]) }}
                          class="px-3 py-2 text-sm font-medium uppercase text-gray-500 hover:text-pink-500 dark:text-gray-300 dark:hover:text-pink-500"
                          aria-label={{ "View posts tagged $tag->name" }}>
                            {{ "$tag->name($tag->posts_count)" }}
                        </a>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div>
            <ul>
                @foreach ($posts as $post)
                <li wire:key="post-{{ $post->id }}" class="py-5">
                    <article class="flex flex-col space-y-2 xl:space-y-0">
                        <dl>
                            <dt class="sr-only">Published on</dt>
                            <dd class="text-base font-medium leading-6 text-gray-500 dark:text-gray-400">
                                <time dateTime="{{ $post->published_at }}">{{ $post->published_at }}</time>
                            </dd>
                        </dl>
                        <div class="space-y-3">
                            <div>
                                <div class="flex flex-wrap">
                                    @if ( isset($post->category_id) )
                                    <a
                                      wire:key="category-{{ $post->category->id }}"
                                      href="{{ route('categories.show', ['category' => $post->category]) }}"
                                      class="mr-3 text-sm font-medium uppercase text-pink-500 hover:text-pink-600 dark:hover:text-pink-400">
                                        {{ $post->category->name }}
                                    </a>
                                    @endif
                                </div>
                                <h2 class="text-2xl font-bold leading-8 tracking-tight">
                                    <a
                                      href="{{ route('posts.show', ['post' => $post]) }}"
                                      class="text-gray-900 dark:text-gray-100">
                                        {{ $post->title }}
                                    </a>
                                </h2>
                                <div class="flex flex-wrap">
                                    @foreach ($post->tags as $tag)
                                    <a
                                      wire:key="tag-{{ $tag->id }}"
                                      href="{{ route('tags.show', ['tag' => $tag]) }}"
                                      class="mr-3 text-sm font-medium uppercase text-pink-500 hover:text-pink-600 dark:hover:text-pink-400">
                                        {{ $tag->name }}
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="prose max-w-none text-gray-500 dark:text-gray-400">
                                {{ $post->summary }}
                            </div>
                        </div>
                    </article>
                </li>
                @endforeach
            </ul>
            {{ $posts->links() }}
        </div>
    </div>
</div>
