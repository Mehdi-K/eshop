  
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="updateProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateProductModal">Edit Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="prod_id" wire:model="prod_id" >
              <div class="form-group">    
                  <label class="col-md-3 control-label" >Name:</label>
                  <div class="col-md-8">
                  <input type="text" class="form-control input-md" name="prod_name" placeholder="Product Name" wire:model="name" wire:keyup="generateSlug"/>
                  @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
              </div>
    
              <div class="form-group">
                  <label class="col-md-3 control-label">Slug:</label>
                  <div class="col-md-8">
                  <input type="text" class="form-control input-md" name="prod_slug" placeholder="Product Slug" wire:model="slug"/>
                  </div>
              </div>
              
              <div class="form-group">    
                  <label class="col-md-3 control-label" >SKU:</label>
                  <div class="col-md-8">
                  <input type="text" class="form-control" name="SKU" placeholder="SKU" wire:model="SKU" />
                  </div>
              </div>
    
              <div class="form-group">    
                <label class="col-md-3 control-label" >Short Description:</label>
                <div class="col-md-8">
                <textarea class="form-control" placeholder="Short Description" wire:model="short_description" ></textarea>
                </div>
              </div>
  
              <div class="form-group">    
                <label class="col-md-3 control-label" >Description:</label>
                <div class="col-md-8">
                <textarea class="form-control" placeholder="Description" wire:model="description" ></textarea>
                </div>
              </div>

              <div class="form-group">    
                  <label class="col-md-3 control-label" >Regular Price:</label>
                  <div class="col-md-8">
                  <input type="text" class="form-control" name="price" wire:model="price" />
                  </div>
              </div>
    
              <div class="form-group">    
                  <label class="col-md-3 control-label" >Color::</label>
                  <div class="col-md-8">
                  <input type="text" class="form-control" name="colors" wire:model="colors" />
                  </div>
              </div>
    
              <div class="form-group">    
                  <label class="col-md-3 control-label" >Dimensions:</label>
                  <div class="col-md-8">
                  <input type="text" class="form-control" name="dimensions" wire:model="dimensions" />
                  </div>
              </div>
    
              <div class="form-group">    
                  <label class="col-md-3 control-label" >Weight:</label>
                  <div class="col-md-8">
                  <input type="text" class="form-control" name="weight" wire:model="weight" />
                  </div>
              </div>
    
              <div class="form-group">    
                  <label class="col-md-3 control-label" >Sales Price:</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" name="sales_price" wire:model="sales_price" />
                  </div>
              </div>
    
              <div class="form-group">    
                <label class="col-md-3 control-label" >Stock:</label>
                <div class="col-md-8">
                  <select class="form-control" wire:model="stuck_status">
                    <option value="instuck">Instock</option>
                    <option value="outofstuck">Out of Stock</option>
                  </select>
                </div>
              </div>
  
              <div class="form-group">    
                <label class="col-md-3 control-label" >Featured:</label>
                <div class="col-md-8">
                  <select class="form-control " name="featured" wire:model="featured">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                  </select>
                </div>
              </div>

              <div class="form-group">    
                  <label class="col-md-3 control-label" >Quantity:</label>
                  <div class="col-md-8">
                  <input type="text" class="form-control" name="quantity" wire:model="quantity"/>
                  </div>
              </div>
    
              <div class="form-group">    
                  <label class="col-md-3 control-label" >Product Image:</label>
                  <div class="col-md-8">
                    <img src="{{ asset('assets/images/products') }}/{{ $image }}" alt="{{ $image }}" width="60"></td>

                  <input type="file" class="input-file form-control input-file" name="image" wire:model="image"/>
                    {{-- @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" alt="{{ $image->temporaryUrl() }}" width="120" />                  
                    @endif --}}
                  </div>
              </div>
    
              <div class="form-group">    
                <label class="col-md-3 control-label" >Category:</label>
                <div class="col-md-8">
                  <select class="form-control" name="featured" wire:model="category_id">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="closeModal()">Close</button>
          <button type="button" class="btn btn-primary" wire:click.prevent="update()">Update Product</button>
        </div>
      </div>
    </div>
  </div>