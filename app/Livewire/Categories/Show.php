<?php

namespace App\Livewire\Categories;

use App\Models\Post;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public int $displayMaxCount = 5;
    public Category $category;

    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function render()
    {
        $category = $this->category;
        $posts = Post::with(['category', 'tags'])
            ->published()
            ->where('category_id', $category->id)
            ->paginate($this->displayMaxCount);

        return view('livewire.categories.show', [
            'posts' => $posts,
        ]);
    }

    public function paginationView()
    {
        return 'livewire.components.pagination';
    }
}
