@extends('layout')

@section('content')
<div class='row'>
<div class='col-md-4'>
<h1>{{ $flyer->street }}</h1>
<h2>{{ $flyer->price }}</h2>

<hr>

<div class='description'>{!! \Html::entities(nl2br($flyer->description)) !!}</div>
</div>
    
    <div class='col-md-8 gallery'>
        @foreach ($flyer->photos->chunk(4) as $set)
        <div class='row'>
            @foreach ($set as $photo) 
            <div class='col-md-3 gallery_image'>
                
                {!! Form::open(['method' => 'DELETE', 'action' => ['PhotosController@destroy', $photo->id]]) !!}
                
                <button type='submit'>Delete</button>
                
                {!! Form::close() !!}
                <a href="/{{ $photo->path }}" data-lity>
                    <img src="/{{ $photo->thumbnail_path }}" alt="">
                </a>
            </div>
            @endforeach
        </div>
        @endforeach
        
        @if ($user && $user->owns($flyer))
        <hr>
        {!! Form::open(['id' => 'addPhotosForm', 'url' => '/'.$flyer->zip.'/'.$flyer->street.'/photos', 'class' => 'dropzone']) !!}


        {!! Form::close() !!}
        @endif
    </div>
</div>
@endsection

@section('scripts.footer')
<script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.js'></script>

<script>
    Dropzone.options.addPhotosForm = {
        paramName: 'photo',
        maxFileSize: 3,
        acceptedFiles: '.jpg, .jpeg, .png, .bmp'
    }
</script>

@endsection