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
                          <canvas id="myChart" width="400" height="400"></canvas>
                          <script>
                          var ctx = document.getElementById('myChart').getContext('2d');
                          var chart = new Chart(ctx, {
                            // The type of chart we want to create
                            type: 'line',

                            // The data for our dataset
                            data: {
                              labels: ["January", "February", "March", "April", "May", "June", "July"],
                              datasets: [{
                                label: "My First dataset",
                                backgroundColor: 'rgb(255, 99, 132)',
                                borderColor: 'rgb(255, 99, 132)',
                                data: [0, 10, 5, 2, 20, 30, 45],
                              }]
                            },

                            // Configuration options go here
                            options: {}
                          });
                          </script>
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
                            <a class="result" data-question="{{ $question }}" style="float: right;">Результат опросов</a>
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
