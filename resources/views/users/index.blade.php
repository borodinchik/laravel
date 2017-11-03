@extends('layouts.app')

@section('content')

  <div class="container">
      <div class="row">
          <div class="col-md-6 col-md-offset-4">
              <div class="panel panel-default">
                  <div class="panel-heading">Список Опросов
                  </div>

                  <div class="panel-body">
                      @if (session('status'))
                          <div class="alert alert-success">
                              {{ session('status') }}
                          </div>
                      @endif
                      @foreach ($questions as $question)
                            <div class="form-group">

                              <a  class="question-id" data-question-id="{{ $question->id }}">{{-- Передаю id  в ajax --}}

                                {{ $question->title }}</a>

                              </div>

                                <hr>
                                                        <div class="myModal-{{ $question->id }}" class="modal">
                                                              <div class="modal-content">

                                                                {{-- @foreach ($questions as $question) --}}


                                                                    {{-- <div class="form-group"> --}}



                                                                <form class="" action="index.html" method="post">

                                                                  <span class="close">&times</span>

                                                                    <h4 class="text-center">{{ $question->body }}</h4>

                                                                  {{ csrf_field() }}

                                                                  @foreach ($question->answer as $value)

                                                                    {{ $value->answer }}

                                                                  <input type="radio" name="answer[]" value="{{ $value->answer }}" checked>

                                                                @endforeach

                                                                <br><button class="btn btn-sm btn-primary" type="button" name="button">Сохранить</button>

                                                              </form>
                                                            {{-- </div> --}}
                                                            {{-- @endforeach --}}
                                                          </div>

                                                        </div>
                            @endforeach


                        </div>
                      </div>
                    </div>

                </div>
              </div>
          </div>
      </div>
  </div>
@endsection
