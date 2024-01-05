<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Index extends Component
{
    public Collection $categories;

    public function mount()
    {
        $this->categories = Category::withCount(['posts' => fn ($query) => $query->published()])->get();
    }

    public function render()
    {
        return view('livewire.categories.index');
    }
}
