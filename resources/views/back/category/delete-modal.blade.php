@foreach ($categories as $category)
    <!-- Modal -->
    <div class="modal fade" id="modalDelete{{ $category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <form action="{{ 'categories/'.$category->id }}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="mb-3">
                      <p>Yakin ingin <b class="text-danger">menghapus</b> kategori <b>{{ $category->name }}</b>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>

            </div>
            
            </div>
        </div>
    </div>
@endforeach