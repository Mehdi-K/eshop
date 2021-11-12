<?php

namespace App\Http\Livewire\User;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductDetails extends Component
{
    public $slug; 
    public $product;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->product = Product::where('slug', $this->slug)->first();
    }

    public function render()
    {
        $popular = Product::where('category_id', $this->product->category_id)->paginate(6);
        // $categories = Category::all();
        return view('livewire.user.product-details', 
                    ['product'=>$this->product, 'popular'=>$popular])->layout('layouts.base');
    }
}
