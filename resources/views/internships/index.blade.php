@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Internship
          <a class="btn btn-success float-xs-right" href="{{ route('internships.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($internships->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Title</th> <th>Desc</th> <th>Content</th><th>Category</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($internships as $internship)
              <tr>
                <td class="text-xs-center"><strong>{{$internship->id}}</strong></td>

                <td>{{$internship->title}}</td> <td>{{$internship->desc}}</td> <td>{{$internship->content}}</td><td>{{$internship->category->cate_name}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('internships.show', $internship->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('internships.edit', $internship->id) }}">
                    E
                  </a>

                  <form action="{{ route('internships.destroy', $internship->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $internships->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
