@extends('back.layout.template')

    @push('css')
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css"> --}}
        <link rel="stylesheet" href="{{ '/css/dataTablesbootstrap5.css' }}">
    @endpush
@section('title', 'List Artikel')
@section('content')
    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Articles</h1>
        </div>
        @include('back.layout.notif')
        <div class="mt-3">
            <a href="{{ '/article/create' }}" class="btn btn-primary mb-2">Create</a>
            <table class="table table-striped table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Views</th>
                        <th>Status</th>
                        <th>Tanggal Publikasi</th>
                        <th>Function</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($articles as $article)
                       <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->Category->name }}</td>
                            <td>{{ $article->views }}</td>
                            @if ($article->status == 0)
                                <td><span class="badge bg-danger">Private</span></td>
                            @else
                                <td><span class="badge bg-success">Published</span></td>
                            @endif
                            <td>{{ $article->publish_date }}</td>
                            <td>
                                <a href="{{ '/article/' . $article->id }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ '/article/' . $article->id . '/edit' }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                       </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </main>

    @push('js')
        {{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}
        <script src="{{ '/js/jquery.js' }}"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
        <script src="{{ '/js/bootstrapa.bundle.min.js' }}"></script>
        {{-- <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script> --}}
        <script src="{{ '/js/dataTables.js' }}"></script>
        <script src="{{ '/js/dataTables.bootstrap5.js' }}"></script>

        <script>
            // new DataTable('#dataTable');
        </script>
        <script>
            $(document).ready(function(){
                new DataTable('#dataTable');
                 $('dataTable').DataTable({
                
                });
            });
           
        </script>
    @endpush
    
@endsection

