<?php

namespace App\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public int $displayMaxCount = 5;
    public Collection $categories;
    public Collection $tags;

    public function mount()
    {
        $this->categories = Category::withCount(['posts' => fn ($query) => $query->published()])->get();
        $this->tags = Tag::withCount(['posts' => fn ($query) => $query->published()])->get();
    }

    public function render()
    {
        $posts = Post::with(['category', 'tags'])
            ->published()
            ->paginate($this->displayMaxCount);

        return view('livewire.posts.index', [
            'posts' => $posts,
        ]);
    }

    public function paginationView()
    {
        return 'livewire.components.pagination';
    }
}
