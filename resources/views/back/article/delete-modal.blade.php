@foreach ($articles as $article)
    <!-- Modal -->
    <div class="modal fade" id="modalDelete{{ $article->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Article</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <form action="{{ 'article/'.$article->id }}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="mb-3">
                      <p>Yakin ingin <b class="text-danger">menghapus</b> artikel <b>{{ $article->title }}</b>?</p>
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