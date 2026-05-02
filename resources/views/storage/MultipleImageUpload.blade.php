@extends('layout.home')
@section('content')
<div class="container mx-auto">
    <div class="col-8">
        <div class="row">
            <div class="card">
        
        <div class="card-header">
            <h1>Multiple Image Upload to Storage Folder</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('img.upload.multiple.storage') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="" class="form-label">Upload Multiple Image</label>
                <input type="file" name="images[]" class="form-control" multiple>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
            
    </div>
        </div>
    </div>
</div>
    
@endsection