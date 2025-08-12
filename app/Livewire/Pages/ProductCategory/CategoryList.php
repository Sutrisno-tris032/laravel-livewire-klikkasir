<?php

namespace App\Livewire\Pages\ProductCategory;

use App\Models\Category;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Sleep;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;

    public $perPage = 10;

    public $category_name;

    public $description;

    public function loadMore() {

        $this->perPage += 10;
    }

    public function save()
    {
        $this->validate([
            'category_name' => 'required|string|max:255',
            'description'   => 'nullable|string|max:500',
        ]);

        Category::create([
            'category_name' => $this->category_name,
            'description'   => $this->description,
            'created_by'    => 'Admin', // kalau ada auth
            'updated_by'    => 'Admin',
        ]);

        $this->reset(['category_name', 'description']);

        $this->dispatch('data-created');
        // $this->dispatch('swalSuccess', 'Kategori berhasil ditambahkan!');
        //  $this->js("alert('Post saved!')"); 
    }
    public function render()
    {
        $data = Category::orderBy('created_at', 'desc')->paginate($this->perPage);

        return view(
            'livewire.pages.product-category.category-list',
            compact('data')
        );
    }
}
