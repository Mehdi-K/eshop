<?php

namespace App\Http\Livewire\User;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Shop extends Component
{
    use WithPagination;

    public function render()
    {
        $categories = Category::all();
        $products = Product::paginate(12);
        return view('livewire.user.shop', ['categories'=>$categories, 'products'=>$products])
                    ->layout('layouts.base');
    }
}
