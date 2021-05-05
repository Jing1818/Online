@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Combination
          <a class="btn btn-success float-xs-right" href="{{ route('combinations.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($combinations->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Internship_id</th> <th>Cycle_id</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($combinations as $combination)
              <tr>
                <td class="text-xs-center"><strong>{{$combination->id}}</strong></td>

                <td>{{$combination->internship_id}}</td> <td>{{$combination->cycle_id}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('combinations.show', $combination->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('combinations.edit', $combination->id) }}">
                    E
                  </a>

                  <form action="{{ route('combinations.destroy', $combination->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $combinations->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
