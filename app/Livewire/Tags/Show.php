<?php

namespace App\Livewire\Tags;

use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public int $displayMaxCount = 5;
    public Tag $tag;

    public function mount(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function render()
    {
        $tag = $this->tag;
        $posts = Post::with(['category', 'tags'])
            ->published()
            ->whereHas('tags', function($query) use ($tag) {
                $query->where('tag_id', $tag->id);
            })
            ->paginate($this->displayMaxCount);

        return view('livewire.tags.show', [
            'posts' => $posts,
        ]);
    }

    public function paginationView()
    {
        return 'livewire.components.pagination';
    }
}
