@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Список Опросов<a href="{{ route('admin.dashboard') }}">|Admin panel</a>
                  <div class="my_result_modal">
                      <div class="modal-content-charts">
                        <span class="close">&times</span>
{{-- <div class="chart-container" style="position: relative; height:40vh; width:80vw"> --}}
                            <canvas id="myChart"></canvas>
{{-- </div> --}}
                      </div>
                    </div>
                    <div class="panel-body">
                        @if (session('status'))
                          <div class="alert alert-success">
                            {{ session('status') }}
                          </div>
                        @endif
                        @foreach ($questions as $question)
                          <div class="form-group" >
                            <h3>{{ $question->title }}</h3>
                            <a class="result" style="float: right;" id={{ $question->id }}>Результат опросов</a>
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
            {{-- Admins Scripts --}}
            <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
            <script src="{{ asset('js/app.js') }}"></script>
            <script src="{{ asset('js/main.js') }}"></script>
            <script src="{{ asset('js/charts.js') }}"></script>
          @endsection
