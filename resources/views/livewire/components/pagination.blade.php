@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div class="space-y-2 pb-8 pt-6 md:space-y-5">
    @if ($paginator->hasPages())
        <nav class="flex justify-between">
            @if ( $paginator->onFirstPage() )
                <button class="cursor-auto disabled:opacity-50" disabled="true">
                    Previous
                </button>
            @else
                <button wire:click="previousPage" x-on:click="{{ $scrollIntoViewJsSnippet }}">
                    Previous
                </button>
            @endif

            <span>{{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}</span>

            @if ( $paginator->hasMorePages() )
                <button wire:click="nextPage" x-on:click="{{ $scrollIntoViewJsSnippet }}">
                    Next
                </button>
            @else
                <button class="cursor-auto disabled:opacity-50" disabled>
                    Next
                </button>
            @endif
        </nav>
    @endif
</div>
