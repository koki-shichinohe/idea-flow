<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class Show extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
        abort_unless($this->post->is_published, 404);
    }

    public function render()
    {
        return view('livewire.posts.show');
    }
}
