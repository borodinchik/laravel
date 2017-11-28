@extends('layouts.app')

@section('content')
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-heading">Список Опросов<img class="avatar" src="/uploads/user_avatar/{{ Auth::user()->avatar }}" alt=""></div>
              <div class="panel-body">
                <div class="modal-loader">
                  <div class="loader">
                  </div>
                </div>
                @foreach ($questions as $question)
                  <div class="form-group">
                    <a  class="question-id id-answer-{{ $question->id }}"  data-question-id="{{ $question->id }}" data-user-id="{{ Auth::user()->id }}">{{-- Передаю id  в ajax --}}
                      {{ $question->title }}
                    </a>
                  </div>
                @endforeach
                @foreach ($questions as $question)
                  <div class="cartQuestions myModal-{{ $question->id }}">
                    <div class="modal-content">
                      <span class="close">&times</span>
                      <div class="form-group">
                        <form  action="{{ url('/user/store') }}" method="post"  class="form-save">
                          <h4 class="text-center">{{ $question->body }}</h4>
                          {{ csrf_field() }}
                          @foreach ($question->answer as $value)
                            <input type="radio" name="user_answer_id" value="{{ $value->id }}" required>
                            {{ $value->answer }}
                          @endforeach
                          <br><button class="btn btn-sm btn-primary form-save save-answer" type="submit">Сохранить</button>
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
<div class="alert alert-success" role="alert">Спасибо за ваш голос </div>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>


<script src="{{ asset('js/user.js') }}"></script>
@endsection
