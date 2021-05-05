@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Combination / Show #{{ $combination->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('combinations.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('combinations.edit', $combination->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Internship_id</label>
<p>
	{{ $combination->internship_id }}
</p> <label>Cycle_id</label>
<p>
	{{ $combination->cycle_id }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
