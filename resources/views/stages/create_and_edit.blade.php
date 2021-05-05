@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Stage /
          @if($stage->id)
            Edit #{{ $stage->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($stage->id)
          <form action="{{ route('stages.update', $stage->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('stages.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                    <label for="internship_id-field">Internship_id</label>
                    <input class="form-control" type="text" name="internship_id" id="internship_id-field" value="{{ old('internship_id', $stage->internship_id ) }}" />
                </div> 
                <div class="form-group">
                	<label for="title-field">Title</label>
                	<input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $stage->title ) }}" />
                </div> 
                <div class="form-group">
                	<label for="stage_goal-field">Stage_goal</label>
                	<input class="form-control" type="text" name="stage_goal" id="stage_goal-field" value="{{ old('stage_goal', $stage->stage_goal ) }}" />
                </div> 
                <div class="form-group">
                    <label for="day_sign-field">Day_sign</label>
                    <input class="form-control" type="text" name="day_sign" id="day_sign-field" value="{{ old('day_sign', $stage->day_sign ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('stages.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
