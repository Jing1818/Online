@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Category / Show #{{ $category->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('categories.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('categories.edit', $category->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Parent_id</label>
<p>
	{{ $category->parent_id }}
</p> <label>Cate_name</label>
<p>
	{{ $category->cate_name }}
</p> <label>Sort</label>
<p>
	{{ $category->sort }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
