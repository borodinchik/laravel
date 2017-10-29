@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Users</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                      <tr class="active">
                        <td>Ф.И.О</td>
                        <td>Email</td>
                        <td>Телефон</td>
                        <td>Возраст</td>
                        <td>Пол</td>
                      </tr>
                      @foreach ($users as $user)
                        <tr class="success">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->your_age }}</td>
                        <td>{{ $user->gender }}</td>
                      </tr>
                      @endforeach
                    </table>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @
  <h3>{{ $user->name }}</h3>
  <div class="form-group">
    <ul>
  <li>Email:{{ $user->email }}</li>
  <li>Phone:{{ $user->phone_number }}</li>
  <li>Age:{{ $user->your_age }}</li>
  <li>Gender:{{ $user->gender }}</li>
</ul>
  </div>
 --}}
