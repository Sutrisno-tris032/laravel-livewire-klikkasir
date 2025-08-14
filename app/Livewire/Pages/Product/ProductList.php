<?php

namespace App\Livewire\Pages\Product;

use App\Models\Inventory;
use App\Models\Product;
use Livewire\Component;
use Str;

class ProductList extends Component
{
    public $barcode;
    public $product_name;
    public $capital_price;
    public $selling_price;
    // public $category_id = 1;
    // public $is_active = 1;
    public $quantity;
    public $reorder_level;
    // public $last_restocked_date;

    public function save()
    {
        $product_uid = (string) \Illuminate\Support\Str::uuid();

        // $this->validate([
        //     'barcode' => 'required',
        //     'product_name' => 'required',
        //     'capital_price' => 'required|numeric',
        //     'selling_price' => 'required|numeric',
        //     // 'category_id' => 'required',
        //     // 'is_active' => 'boolean',
        //     'quantity' => 'required|integer|min:1',
        //     'reorder_level' => 'required|integer|min:1',
        //     // 'last_restocked_date' => 'date|nullable',
        // ]);

        Product::create([
            'product_uid' => $product_uid,
            'barcode' => $this->barcode,
            'product_name' => $this->product_name,
            'capital_price' => $this->capital_price,
            'selling_price' => $this->selling_price,
            'category_id' => 1,
            'is_active' => 1,
            'created_by' => 'Admin', // kalau ada auth
            'updated_by' => 'Admin',
        ]);

        Inventory::create([
            'product_uid' => $product_uid,
            'quantity' => $this->quantity,
            'reorder_level' => 1,
            'last_restocked_date' => now(),
            'created_by' => 'Admin', // kalau ada auth
            'updated_by' => 'Admin',
        ]);



        $this->reset([
            'barcode',
            'product_name',
            'capital_price',
            'selling_price',
            // 'category_id',
            // 'is_active',
            'quantity',
            // 'reorder_level',
        ]);

        $this->dispatch('data-created');
    }
    public function render()
    {
        $data = Product::with('inventory')
            ->orderBy('id', 'desc')
            ->paginate(10);

        // dd($data);

        return view(
            'livewire.pages.product.product-list',
            compact('data')
        );
    }
}
