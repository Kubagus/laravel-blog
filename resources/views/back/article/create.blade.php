@extends('back.layout.template')

@section('title', 'Create Article')

@section('content')
    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create Article</h1>
        </div>
        @include('back.layout.notif')
        <div class="mt-3">
            <form action="{{ '/article' }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                        </div>
                    </div>

                    <div class="col-6">
                         <div class="mb-3">
                            <label for="category">Category</label>
                            <select name="category_id" id="category" class="form-control">
                                <option value="" hidden>-- choose --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div class="mb-3">
                    <label for="desc">Description</label>
                    <textarea name="desc" id="desc" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="img">Image (max 2mb)</label>
                    <input type="file" name="img" id="img" class="form-control">
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="" hidden>-- choose --</option>
                                <option value="1">Publish</option>
                                <option value="0">Private</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="publish_date">Publish Date</label>
                           <input type="date" name="publish_date" id="publish_date" class="form-control">
                        </div>
                    </div>
                </div>

                <button type="submit" class="float-end btn btn-primary">Save</button>
            </form>
        </div>
    </main>

    @push('js')
        {{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}
        <script src="{{ '/js/jquery.js' }}"></script>
    @endpush
    
@endsection

