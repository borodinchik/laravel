{{-- <form  action="/user/create" method="post">
  <span class="close">&times</span>
    <h4 class="text-center">{{ $question->body }}</h4>
    {{ csrf_field() }}
@foreach ($question->answer as $value)

{{ $value->answer }}

<input type="radio" name="user_response[]" value="{{ $value->answer }}" checked>
  @endforeach
  <br><button class="btn btn-sm btn-primary" type="submit" name="save">Сохранить</button>
</form> --}}
