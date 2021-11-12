<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Product;
use Illuminate\support\Str;
use App\Models\Category;
use Livewire\WithFileUploads;

class IndexProducts extends Component
{
    use WithFileUploads;

    public $prod_id;
    public $name;
    public $slug;
    public $SKU;
    public $short_description;
    public $description;
    public $weight;
    public $dimensions;
    public $colors;
    public $price;
    public $sales_price;
    public $stuck_status;
    public $featured=0;
    public $quantity;
    public $image;
    public $category_id;

    public function render()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('livewire.admin.products.index-products', 
            ['products'=>$products, 'categories'=>$categories])->layout('layouts.base');
    }

    public function mount()
    {
        $this->resetInputFields();
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function resetInputFields()
    {
        $categories = Category::all();
        $this->categories = $categories;

        $this->prod_id = "";
        $this->name = "";
        $this->slug = "";
        $this->SKU = "";
        $this->short_description = "";
        $this->description = "";
        $this->weight = "";
        $this->dimensions = "";
        $this->colors = "";    
        $this->price = "";
        $this->sales_price = "";
        $this->stuck_status = "instuck";
        $this->featured = "0";
        $this->qauntity = "";
        $this->image = "";
        $this->category_id = "";    
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'SKU' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stuck_status' => 'required',
            'featured' => 'required',
            'quantity' => 'required',
            // 'image' => 'image|max:1024',
            'category_id' => 'required'
        ]);

        // $this->image->store('photos');
        Product::create($validatedData);
        session()->flash('message', 'Product was created successfuly !');
        $this->resetInputFields();
        return redirect(route('admin_products'));
    }

    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        $this->prod_id = $product->id;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->SKU = $product->SKU;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->weight = $product->weight;
        $this->dimensions = $product->dimensions;
        $this->colors = $product->colors;    
        $this->price = $product->price;
        $this->sales_price = $product->sales_price;
        $this->stuck_status = $product->stuck_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->category_id = $product->category_id;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'SKU' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stuck_status' => 'required',
            'featured' => 'required',
            'quantity' => 'required',
            // 'image' => 'image|max:1024',
            'category_id' => 'required'
        ]);

        $product = Product::find($this->prod_id);
        $product->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'SKU' => $this->SKU,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'weight' => $this->weight,
            'dimensions' => $this->dimensions,
            'colors' => $this->colors,
            'price' => $this->price,
            'stuck_status' => $this->stuck_status,
            'featured' => $this->featured,
            'image' => $this->image,
            'quantity' => $this->quantity,
            'category_id' => $this->category_id,
        ]);

        // $this->image->store('photos');

        session()->flash('message', 'Product was updated successfuly !');
        // $this->resetInputFields();
        return redirect(route('admin_products'));

    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('message', 'Product was deleted successfuly !');
        return redirect(route('admin_products'));
    }
        
    public function closeModal()
    {
        return redirect(route('admin_products'));
    }

}
