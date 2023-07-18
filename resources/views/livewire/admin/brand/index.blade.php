<div>
    {{-- Include modal form --}}
    @include('livewire.admin.brand.modal-form')
    
    <div class="row">
        <div class="col-md-12">
            {{-- Display success message if exists --}}
            @if (session('message'))
                <p class="alert alert-success">{{ session('message') }}</p>
            @endif
            
            <div class="card">
                <div class="card-header">
                    {{-- Brand list header --}}
                    <div class="d-flex align-items-center justify-content-between">
                        <h4>Brand list</h4>
                        <a href="" data-bs-toggle="modal" data-bs-target="#addBrandModal" class="btn btn-primary float-end">Add Brands</a>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Brand table --}}
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Iterate over brands --}}
                            @forelse ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>
                                        @if ($brand->category)
                                        {{ $brand->category->name }}</td>
                                        @else
                                        <p>No category</p>
                                        @endif
                                    <td>{{ $brand->slug }}</td>
                                    <td>{{ $brand->status == '1'? 'hidden':'visible' }}</td>
                                    <td>
                                        {{-- Edit button --}}
                                        <a href="#" wire:click="editBrand({{ $brand->id }})" data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-success">Edit</a>
                                        
                                        {{-- Delete button --}}
                                        <a href="" wire:click="deleteBrand({{ $brand->id }})" data-bs-toggle="modal" data-bs-target="#deleteBrandModal" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                {{-- Display message when no brand found --}}
                                <tr>
                                    <td colspan="5">No Brand Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    {{-- Display pagination links --}}
                    <div>
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    // Close modal event listener
    window.addEventListener('close-modal', event => {
        $('#addBrandModal').modal('hide');
        $('#updateBrandModal').modal('hide');
        $('#deleteBrandModal').modal('hide');
    });
</script>
@endpush
