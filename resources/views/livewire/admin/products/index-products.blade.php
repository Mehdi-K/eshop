<div>
    @include('livewire.admin.products.create-product')
    @include('livewire.admin.products.update-product')
        <div class="container">
            <div class="col-sm-12">
                @if(session()->has('message'))
                <div class="alert alert-success"> {{ session('message') }} </div>
                @endif
            </div>
            
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h3>All Products</h3>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal"
                                                                        wire:click.prevent="resetInputFields()" >
                            Add New Product
                        </button>

                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Image</td>
                                <td>SKU</td>
                                <td>Category</td>
                                <td>Quantity</td>
                                <td>Short Desc.</td>
                                <td>Price</td>
                                <td>Sales Price</td>
                                <td>Featured</td>
                                <td colspan = 2>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td><img src="{{ asset('assets/images/products') }}/{{ $product->image }}" alt="{{ $product->image }}" width="60"></td>
                                    <td>{{$product->SKU}}</td>
                                    <td>{{$product->category_id}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->short_description}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->sales_price}}</td>
                                    <td>{{$product->featured}}</td>
                                    <td>
                                        <button class="btn btn-info" data-toggle="modal" data-target="#updateProductModal" 
                                            wire:click.prevent="edit({{ $product->id , $product->image}})" >Edit</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger"  
                                            wire:click.prevent="destroy({{ $product->id }})" >Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                    </div>
                </div>   
                <div>
            </div>
        
        </div>
</div>