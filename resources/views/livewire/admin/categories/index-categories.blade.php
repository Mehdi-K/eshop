<div>
    @include('livewire.admin.categories.create-category')
    @include('livewire.admin.categories.update-category')
        <div class="container">
                
            <div class="col-sm-12">
                @if(session()->has('message'))
                <div class="alert alert-success"> {{ session('message') }} </div>
                @endif
            </div>
            
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h3>All Categories</h3>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">
                            Add New Category
                        </button>

                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Slug</td>
                                <td colspan = 2>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                        <button class="btn btn-info" data-toggle="modal" data-target="#updateCategoryModal" 
                                            wire:click.prevent="edit({{ $category->id }})" >Edit</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger"  
                                            wire:click.prevent="destroy({{ $category->id }})" >Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                    </div>
                </div> 
            </div>
        </div>
</div>