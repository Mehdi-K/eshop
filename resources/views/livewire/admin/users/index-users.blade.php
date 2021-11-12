<div>
    @include('livewire.admin.users.update-user')
        <div class="container">
            <div class="col-sm-12">
                @if(session()->has('message'))
                <div class="alert alert-success"> {{ session('message') }} </div>
                @endif
            </div>
            
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h3>All Users</h3>
                        <!-- Button trigger modal -->
                        {{-- <button type="button" class="btn btn-primary" href="{{ route('register') }}" >
                            Add New User
                        </button> --}}

                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Role</td>
                                {{-- <td>Photo</td> --}}
                                <td colspan = 2>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                    {{-- <td><img src="{{ $user->image }}" alt="{{ $user->image }}" width=""60></td> --}}
                                    <td>
                                        <button class="btn btn-info" data-toggle="modal" data-target="#updateUserModal" 
                                            wire:click.prevent="edit({{ $user->id }})" >Edit</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger"  
                                            wire:click.prevent="destroy({{ $user->id }})" >Delete</button>
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