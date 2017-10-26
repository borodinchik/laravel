@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Создание опроса</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                      <form class="form-horizontal" action="/questions" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">

                    <input type="text" class="form-control" name="title" placeholder="Название вопроса">
                    </div>
                    <div class="form-group">

                    <textarea name="body" class="form-control" rows="3" placeholder="Вопрос"></textarea>
                  </div>
                  <div class="form-group" id="sites">
                    <div class="col-sm-10" >
                      <hr >

                    </div>


                  </div>
                  <div class="form-group" >
                    <div class="col-sm-10" id="back">
                    <button type="submit" class="btn btn-default">Добавить</button>
                    </div>
                  </div>

                  </form>

                  <div class="form-group">

                <button id="input" type="submit" class="btn btn-primary">Добавить вариант ответа</button>

            </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
