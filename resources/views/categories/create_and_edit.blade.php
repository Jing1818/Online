@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Category /
          @if($category->id)
            Edit #{{ $category->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($category->id)
          <form action="{{ route('categories.update', $category->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('categories.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                    <label for="parent_id-field">Parent_id</label>
                    <input class="form-control" type="text" name="parent_id" id="parent_id-field" value="{{ old('parent_id', $category->parent_id ) }}" />
                </div> 
                <div class="form-group">
                	<label for="cate_name-field">Cate_name</label>
                	<input class="form-control" type="text" name="cate_name" id="cate_name-field" value="{{ old('cate_name', $category->cate_name ) }}" />
                </div> 
                <div class="form-group">
                    <label for="sort-field">Sort</label>
                    <input class="form-control" type="text" name="sort" id="sort-field" value="{{ old('sort', $category->sort ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('categories.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
