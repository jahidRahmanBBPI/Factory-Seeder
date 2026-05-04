@extends('layout.home')
@section('content')
<div class="container mx-auto">
    <div class="col-8">
        <div class="row">
            <div class="card">
        
        <div class="card-header">
            <h1>Single Image Upload to Public Folder</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('img.upload') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="" class="form-label">Upload Image</label>
                <input type="file" name="image" class="form-control">
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
            
    </div>
        </div>
    </div>
</div>
    
@endsection