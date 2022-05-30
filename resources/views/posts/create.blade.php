@extends('template')
 
@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Create New Post</h2>
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
 
<form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="POST">
    @csrf
 
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Video Id:</strong>
                <input type="text" name="videoId" class="form-control" placeholder="Video Id">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label><strong>Channel Title :</strong></label><br/>
                <select class="form-control" id="channelTitle" name="channelTitle" onchange="idChannels()">
                   <option value="No Channel" data-id="1">Pilih Title</option>
                    @foreach($post['channels'] as $channels)
                        <option value="{{ $channels->channel_title }}" data-id="{{ $channels->channel_id }}">{{ $channels->channel_title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Channel Id:</strong>
                <input type="text" name="channelId" id="channelId" class="form-control" placeholder="Channel Id">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label><strong>Select Category :</strong></label><br/>
                <select class="form-control" name="categories[]" multiple="">
                    @foreach($post['categories'] as $categories)
                        <option value="{{ $categories->name }}">{{ $categories->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Featured:</strong>
                    <select name="featured" id="featured">
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Published:</strong>
                    <select name="published" id="published">
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Thumbnail (200x300) :</strong>
                <input type="text" name="thumbnail" class="form-control" placeholder="thumbnail">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Background (maxres):</strong>
                <input type="text" name="background" class="form-control" placeholder="background">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Deskripsi:</strong>                    
                <textarea class="ckeditor form-control" name="description" placeholder="Description"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
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
<script>
function idChannels(){
    var elem=document.getElementById("channelTitle");
    var id = elem.options[elem.selectedIndex].getAttribute('data-id');

    document.getElementById("channelId").value = id;
} </script>
@endsection
