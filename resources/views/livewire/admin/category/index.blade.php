<div>
    {{-- Modal Delete Category --}}
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Hapus Kategori</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                        Yakin ingin menghapus kategori ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Area Tabel --}}
    <div class="row">
        <div class="col-md-12">
            {{-- Alert CRUD --}}
            @if (session('message'))
            <p class="alert alert-success">{{ session('message') }}</p>
            @endif
            {{-- Tabel --}}
            <div class="card">
                {{-- Tabel Header --}}
                <div class="card-header bg-white">
                   <div class="d-flex justify-content-between align-items-center">
                    <span class="align-middle fs-3" style="font-weight: 500">Kategori</span>
                    <a href="{{ url('admin/category/create') }}" class="btn-primary btn text-white">Tambah Kategori</a>
                   </div>
                </div>
                {{-- Tabel konten --}}
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->status == '1'? 'Hidden': 'Visible' }}</td>
                                <td>
                                    <a href="{{ url('admin/category/'.$category->id.'/edit') }}" class="btn btn-success text-white">Ubah</a>
                                    <a href="" wire:click="deleteCategory({{ $category->id }})" data-bs-target="#deleteModal" data-bs-toggle="modal" class="btn btn-danger text-white">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#deleteModal').modal('hide');
    });
</script>
@endpush