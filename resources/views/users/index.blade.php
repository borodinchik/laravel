@extends('layouts.app')

@section('content')
{{-- <input type="hidden" id="showQuestion" value="{{ route('show.question') }}"> --}}
  <div class="container">
      <div class="row">
          <div class="col-md-4 col-md-offset-4">
              <div class="panel panel-default">
                  <div class="panel-heading">Список Опросов<img class="avatar" src="/uploads/user_avatar/{{ Auth::user()->avatar }}" alt="">
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
                            {{ $question->title }}
                          </a>
                        </div>
                        <hr>

                        <div class="cartQuestions myModal-{{ $question->id }}" >
                          <div class="modal-content">
                            <div class="form-group">
                            <form  action="" method="post">
                              <span class="close">&times</span>
                                <h4 class="text-center">{{ $question->body }}</h4>
                                  {{ csrf_field() }}
                                    @foreach ($question->answer as $value)
                                      {{ $value->answer }}
                                        <input type="radio" name="user_answer[]" value="{{ $value->answer }}" required>
                                      @endforeach
                                        <br><button class="btn btn-sm btn-primary form-save" type="submit">Сохранить</button>
                                      </form>
                                    </div>
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
