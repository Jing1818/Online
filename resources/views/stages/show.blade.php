@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Stage / Show #{{ $stage->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('stages.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('stages.edit', $stage->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Internship_id</label>
<p>
	{{ $stage->internship_id }}
</p> <label>Title</label>
<p>
	{{ $stage->title }}
</p> <label>Stage_goal</label>
<p>
	{{ $stage->stage_goal }}
</p> <label>Day_sign</label>
<p>
	{{ $stage->day_sign }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
