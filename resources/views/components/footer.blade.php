<footer>
  <div class="mt-16 flex flex-col items-center">
    <div class="mb-3 flex space-x-4">
    </div>
    <div class="mb-2 flex space-x-2 text-sm text-gray-500 dark:text-gray-400">
      <span>{{ config('app.author', 'Laravel') }}</span>
      <span> • </span>
      <span>{{ '©'.\Carbon\Carbon::now()->format('Y') }}</span>
      <span> • </span>
      <a href="/">{{ config('app.name', 'Laravel') }}</a>
    </div>
    <div class="mb-8 text-sm text-gray-500 dark:text-gray-400">
      <a href="https://github.com/timlrx/tailwind-nextjs-starter-blog">
        Tailwind Nextjs Theme
      </a>
    </div>
  </div>
</footer>
