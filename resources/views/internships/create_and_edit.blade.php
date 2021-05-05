@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Internship /
          @if($internship->id)
            Edit #{{ $internship->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($internship->id)
          <form action="{{ route('internships.update', $internship->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('internships.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                	<label for="title-field">Title</label>
                	<input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $internship->title ) }}" />
                </div> 
                <div class="form-group">
                	<label for="desc-field">Desc</label>
                	<input class="form-control" type="text" name="desc" id="desc-field" value="{{ old('desc', $internship->desc ) }}" />
                </div> 
                <div class="form-group">
                	<label for="content-field">Content</label>
                	<textarea name="content" id="content-field" class="form-control" rows="3">{{ old('content', $internship->content ) }}</textarea>
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('internships.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
