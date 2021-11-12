<div>
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-head">
                    
                    <form wire:submit.prevent="save">
                        @csrf
                        @if ($photo)
                            Photo Preview:
                            <img src="{{ $photo->temporaryUrl() }}">
                        @endif
                    
                        <input type="file" wire:model="photo">
                    
                        @error('photo') <span class="error">{{ $message }}</span> @enderror
                    
                        <button type="submit">Save Photo</button>
                    </form>
                    <h1>{{ $photo }}</h1>
                    
                </div>
            </div>
        </div>
    </div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    {{-- <form wire:submit.prevent="save">
        <input type="file" wire:model="photo">
    
        @error('photo') <span class="error">{{ $message }}</span> @enderror
    
        <button type="submit">Save Photo</button>
    </form> --}}
</div>
