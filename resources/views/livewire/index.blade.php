<div>
    <div class="divide-y divide-gray-200 dark:divide-gray-700">
        <div class="space-y-2 pb-8 pt-6 md:space-y-5">
            <h1 class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl sm:leading-10 md:text-6xl md:leading-14">
                Latest
            </h1>
        </div>
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @if (blank($posts))
                No posts found.
            @else
                @foreach ($posts as $post)
                    <li wire:key="post-{{ $post->id }}" class="py-12">
                        <article>
                            <div class="space-y-2 xl:grid xl:grid-cols-4 xl:items-baseline xl:space-y-0">
                                <dl>
                                    <dt class="sr-only">Published on</dt>
                                    <dd class="text-base font-medium leading-6 text-gray-500 dark:text-gray-400">
                                        <time dateTime="{{ $post->published_at }}">{{ $post->published_at }}</time>
                                    </dd>
                                </dl>
                                <div class="space-y-5 xl:col-span-3">
                                    <div class="space-y-6">
                                        <div>
                                            <div class="flex flex-wrap">
                                                @if ( isset($post->category_id) )
                                                    <a
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
                                    <div class="text-base font-medium leading-6">
                                        <a
                                          href="{{ route('posts.show', ['post' => $post]) }}"
                                          class="text-pink-500 hover:text-pink-600 dark:hover:text-pink-400"
                                          aria-label={{ 'Read more: ' . $post->title }}>
                                            Read more &rarr;
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="flex justify-end text-base font-medium leading-6">
        <a
          href="{{ route('posts.index') }}"
          class="text-pink-500 hover:text-pink-600 dark:hover:text-pink-400"
          aria-label="All posts">
            All Posts &rarr;
        </a>
    </div>
</div>
