@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Список Опросов
                    <a style="float:right" href="#">Результаты опроса</a></div>

                  <div class="panel-body">
                      @if (session('status'))
                          <div class="alert alert-success">
                              {{ session('status') }}
                          </div>
                      @endif
                        @foreach ($questions as $question)

                          <div class="form-group">
                            <h3>{{ $question->title }}</h3>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['delete.question', $question->id]]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                            {{-- <form class="" action="/questions/{{ $question->id }}" method="delete"> --}}

                              {{-- <button  class="btn btn-sm btn-danger"type="button" name="button">Delete</button> --}}

                            {{-- </form> --}}
                            {!! Form::close() !!}
                          </div>



                        @endforeach


                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection
