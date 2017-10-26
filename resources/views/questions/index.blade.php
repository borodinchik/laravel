@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Список Опросов</div>

                  <div class="panel-body">
                      @if (session('status'))
                          <div class="alert alert-success">
                              {{ session('status') }}
                          </div>
                      @endif
                        @foreach ($questions as $question)

                          {{-- <a class="link" href="/questions/{{ $questions->id }}"> --}}
                          <div class="form-group">
                            <h3>{{ $question->title }}</h3><button class="btn btn-sm btn-danger" type="button" name="delete">Deleted</button><hr>


                          </div>

                          {{-- </a><hr> --}}

                        @endforeach


                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection
