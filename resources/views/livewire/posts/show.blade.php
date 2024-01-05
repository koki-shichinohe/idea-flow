<article>
    <div class="xl:divide-y xl:divide-gray-200 xl:dark:divide-gray-700">
        <header class="pt-6 xl:pb-6">
            <div class="space-y-1 text-center">
                <dl class="space-y-10">
                    <div>
                        <dt class="sr-only">Published on</dt>
                        <dd class="text-base font-medium leading-6 text-gray-500 dark:text-gray-400">
                            <time dateTime="{{ $post->published_at }}">{{ $post->published_at }}</time>
                        </dd>
                    </div>
                </dl>
                <div>
                    <h1 class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl sm:leading-10 md:text-5xl md:leading-14">
                        {{ $post->title }}
                    </h1>
                </div>
            </div>
        </header>
        <div class="grid-rows-[auto_1fr] divide-y divide-gray-200 pb-8 dark:divide-gray-700 xl:grid xl:grid-cols-4 xl:gap-x-6 xl:divide-y-0">
            <div className="pb-10 pt-6 xl:border-b xl:border-gray-200 xl:pt-11 xl:dark:border-gray-700"></div>

            <div class="divide-y divide-gray-200 dark:divide-gray-700 xl:col-span-3 xl:row-span-2 xl:pb-0">
                <div class="prose max-w-none pb-8 pt-10 dark:prose-invert">{!! $post->body !!}</div>
            </div>

            <footer>
                <div class="divide-gray-200 text-sm font-medium leading-5 dark:divide-gray-700 xl:col-start-1 xl:row-start-2 xl:divide-y">
                    @if (isset($post->category_id))
                    <div class="py-4 xl:py-8">
                        <h2 class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">
                            Categories
                        </h2>
                        <div class="flex flex-wrap">
                            <a
                              href={{ route('categories.show', ['category' => $post->category]) }}
                              class="mr-3 text-sm font-medium uppercase text-pink-500 hover:text-pink-600 dark:hover:text-pink-400">
                                {{ $post->category->name }}
                            </a>
                        </div>
                    </div>
                    @endif
                    @if ($post->tags->isNotEmpty())
                    <div class="py-4 xl:py-8">
                        <h2 class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">
                            Tags
                        </h2>
                        <div class="flex flex-wrap">
                            @foreach ($post->tags as $tag)
                                <a
                                  href={{ route('tags.show', ['tag' => $tag]) }}
                                  class="mr-3 text-sm font-medium uppercase text-pink-500 hover:text-pink-600 dark:hover:text-pink-400">
                                    {{ $tag->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                <div class="pt-4 xl:pt-8">
                    <a
                      href={{ route('posts.index') }}
                      class="text-pink-500 hover:text-pink-600 dark:hover:text-pink-400"
                      aria-label="Back to the blog">
                        &larr; Back to the blog
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>
