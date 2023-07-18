<!-- Modal Add Brand -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brand</h1>
        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="storeBrand">
        <div class="modal-body">
          <div class="mb-3">
            <label for="">Select category</label>
            <select wire:model.defer="category_id" required class="form-control">
              <option value="">-- Select category --</option>
              @foreach ($categories as $cateItem)
              <option value="{{ $cateItem->id }}">{{ $cateItem->name }}</option>
              @endforeach
            </select>
            @error('category_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="">Brand Name</label>
            <input type="text" wire:model.defer="name" class="form-control">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="">Slug</label>
            <input type="text" wire:model.defer="slug" class="form-control">
            @error('slug')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="">Status</label>
            <input type="checkbox" wire:model.defer="status">Checked=Hidden, Un-Checked=Visible
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Update Brand -->
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Brand</h1>
        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Show loading spinner when data is being loaded -->
      <div wire:loading>
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
      <!-- Show form when data is loaded -->
      <div wire:loading.remove>
        <form wire:submit.prevent="updateBrand">
          <div class="modal-body">
            <div class="mb-3">
              <label for="">Select category</label>
              <select wire:model.defer="category_id" required class="form-control">
                <option value="">-- Select category --</option>
                @foreach ($categories as $cateItem)
                <option value="{{ $cateItem->id }}">{{ $cateItem->name }}</option>
                @endforeach
              </select>
              @error('category_id')
              <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="">Brand Name</label>
              <input type="text" wire:model.defer="name" class="form-control">
              @error('name')
              <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="">Slug</label>
              <input type="text" wire:model.defer="slug" class="form-control">
              @error('slug')
              <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="">Status</label>
              <input type="checkbox" wire:model.defer="status">Checked=Hidden, Un-Checked=Visible
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Delete Brand -->
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Brand</h1>
        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Show loading spinner when data is being deleted -->
      <div wire:loading>
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
      <!-- Show confirmation form when data deletion is not in progress -->
      <div wire:loading.remove>
        <form wire:submit.prevent="destroyBrand">
          <div class="modal-body">
            <p>Yakin ingin menghapus brand ini?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
