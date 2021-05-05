@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Stage
          <a class="btn btn-success float-xs-right" href="{{ route('stages.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($stages->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Internship_id</th> <th>Title</th> <th>Stage_goal</th> <th>Day_sign</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($stages as $stage)
              <tr>
                <td class="text-xs-center"><strong>{{$stage->id}}</strong></td>

                <td>{{$stage->internship_id}}</td> <td>{{$stage->title}}</td> <td>{{$stage->stage_goal}}</td> <td>{{$stage->day_sign}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('stages.show', $stage->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('stages.edit', $stage->id) }}">
                    E
                  </a>

                  <form action="{{ route('stages.destroy', $stage->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $stages->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
