<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Index extends Component
{
    public Collection $tags;

    public function mount()
    {
        $this->tags = Tag::withCount(['posts' => fn ($query) => $query->published()])->get();
    }

    public function render()
    {
        return view('livewire.tags.index');
    }
}
