<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use Illuminate\support\Str;


class IndexCategories extends Component
{
    public $cat_id;
    public $name;
    public $slug;
    public $description;

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.categories.index-categories', ['categories'=>$categories])->layout('layouts.base');
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function resetInputFields()
    {
        $this->cat_id = "";
        $this->name = "";
        $this->slug = "";
        $this->description = "";
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => '',
        ]);

        Category::create($validatedData);
        session()->flash('message', 'Category was created successfuly !');
        $this->resetInputFields();
        return redirect(route('admin_categories'));
    }

    public function edit($id)
    {
        $category = Category::where('id',$id)->first();
        $this->cat_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->description = $category->description;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $category = Category::find($this->cat_id);
        $category->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Category was updated successfuly !');
        $this->resetInputFields();
        return redirect(route('admin_categories'));

    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('message', 'Category was deleted successfuly !');
        return redirect(route('admin_categories'));
    }
        
    public function closeModal()
    {
        return redirect(route('admin_categories'));
    }

}

