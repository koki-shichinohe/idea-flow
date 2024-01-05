<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Index extends Component
{
    public int $displayMaxCount = 5;

    public function render()
    {
        $posts = Post::with(['category', 'tags'])
            ->published()
            ->orderByDesc('published_at')
            ->limit($this->displayMaxCount)
            ->get();
        return view('livewire.index', ['posts' => $posts]);
    }
}
