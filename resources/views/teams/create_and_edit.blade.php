@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Team /
          @if($team->id)
            Edit #{{ $team->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($team->id)
          <form action="{{ route('teams.update', $team->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('teams.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                	<label for="name-field">Name</label>
                	<input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $team->name ) }}" />
                </div> 
                <div class="form-group">
                    <label for="teamsize-field">Teamsize</label>
                    <input class="form-control" type="text" name="teamsize" id="teamsize-field" value="{{ old('teamsize', $team->teamsize ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('teams.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
