@extends('layouts.app')

@section('content')

  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Список Опросов
                  <button id="myBtn" style="float:right" type="button" name="button" class="btn btn-sm">
                    Результат опроса</button>
                    <div id="myModal" class="modal">
                    <div class="modal-content">
                      <span id="close">x</span>
                      <p>HI</p>
                    </div>
                    </div>
                  </div>

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
