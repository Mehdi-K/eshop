  
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
              @csrf
              <div class="form-group">    
                  <label for="name">Category Name:</label>
                  <input type="text" class="form-control" name="cat_name" wire:model="name" wire:keyup="generateSlug"/>
                  @error('name') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
    
              <div class="form-group">
                  <label for="last_name">Category Slug:</label>
                  <input type="text" class="form-control" name="cat_slug" wire:model="slug"/>
                  @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
              </div>

            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="closeModal()">Close</button>
          <button type="button" class="btn btn-primary" wire:click.prevent="store()">Add Category</button>
        </div>
      </div>
    </div>
  </div>