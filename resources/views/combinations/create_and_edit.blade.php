@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Combination /
          @if($combination->id)
            Edit #{{ $combination->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($combination->id)
          <form action="{{ route('combinations.update', $combination->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('combinations.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                    <label for="internship_id-field">Internship_id</label>
                    <input class="form-control" type="text" name="internship_id" id="internship_id-field" value="{{ old('internship_id', $combination->internship_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="cycle_id-field">Cycle_id</label>
                    <input class="form-control" type="text" name="cycle_id" id="cycle_id-field" value="{{ old('cycle_id', $combination->cycle_id ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('combinations.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
