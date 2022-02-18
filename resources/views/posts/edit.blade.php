@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Post</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="{{ route('posts.update',$post->id) }}" method="POST">
        @csrf
        @method('PUT')
 
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Video Id:</strong>
                    <input type="text" name="videoId" value="{{ $post->videoId }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Channel Id:</strong>
                    <input type="text" name="channelId" value="{{ $post->channelId }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Featured:</strong>
                        <select name="featured" id="featured">
                        <option value="1" {{  ($post->featured == 1 ? 'selected' : '') }}>Ya</option>
                        <option value="0" {{  ($post->featured == 0 ? 'selected' : '') }}>Tidak</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Channel Title:</strong>
                    <input type="text" name="channelTitle" value="{{ $post->channelTitle }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Content:</strong>
                    <textarea class="ckeditor form-control" name="description" placeholder="Content">{{ $post->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Published:</strong>
                        <select name="published" id="published">
                        <option value="1" {{  ($post->published == 1 ? 'selected' : '') }}>Ya</option>
                        <option value="0" {{  ($post->published == 0 ? 'selected' : '') }}>Tidak</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Thumbnail:</strong>
                    <input type="text" name="thumbnail" value="{{ $post->thumbnail }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Background:</strong>
                    <input type="text" name="background" value="{{ $post->background }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
 
    </form>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
    </script>
    <script type="text/javascript">
        CKEDITOR.replace('content', {
            filebrowserUploadMethod: 'form'
    });
        CKEDITOR.replace( 'content', {
    removeButtons: 'Cut,Copy,Paste,Undo,Redo,Anchor'
        });
</script>
@endsection