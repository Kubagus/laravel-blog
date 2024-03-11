<!-- /resources/views/post/create.blade.php -->
 

@if ($errors->any())
    <div class="mt3">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div> 
    </div>
@endif

<div class="swal" data-swal="{{ session('success') }}"></div>

{{-- @if (session('success'))
    <div class="mt3">
        <div class="alert alert-success">
            {{ session('success') }}
        </div> 
    </div>
@endif --}}
 
<!-- Create Post Form -->