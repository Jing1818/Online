@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Internship / Show #{{ $internship->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('internships.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('internships.edit', $internship->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Title</label>
<p>
	{{ $internship->title }}
</p> <label>Desc</label>
<p>
	{{ $internship->desc }}
</p> <label>Content</label>
<p>
	{{ $internship->content }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
