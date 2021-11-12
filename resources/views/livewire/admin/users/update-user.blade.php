  
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateUserModal">Edit User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="user_id" wire:model="user_id" >
              <div class="form-group">    
                  <label class="col-md-3 control-label" >Name:</label>
                  <div class="col-md-8">
                  <input type="text" class="form-control input-md" name="user_name" placeholder="User Name" wire:model="name"/>
                  @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
              </div>
    
              <div class="form-group">
                  <label class="col-md-3 control-label">Email:</label>
                  <div class="col-md-8">
                  <input type="text" class="form-control input-md" name="user_email" placeholder="User Email" wire:model="email"/>
                  </div>
              </div>
              
              <div class="form-group">    
                <label class="col-md-3 control-label" >Role:</label>
                <div class="col-md-8">
                  <select class="form-control" wire:model="role">
                    <option value="USR">Normal User</option>
                    <option value="ADM">Administrator</option>
                  </select>
                </div>
              </div>
    
              {{-- <div class="form-group">    
                  <label class="col-md-3 control-label" >User Photo:</label>
                  <div class="col-md-8">
                  <input type="file" class="input-file form-control input-file" name="image" wire:model="image"/>
                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" alt="{{ $image->temporaryUrl() }}" width="120" />                  
                    @endif
                  </div>
              </div> --}}
    
            </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="closeModal()">Close</button>
          <button type="button" class="btn btn-primary" wire:click.prevent="update()">Update User</button>
        </div>
      </div>
    </div>
  </div>