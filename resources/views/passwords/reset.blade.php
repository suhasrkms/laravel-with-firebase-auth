@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Reset Password</div>
          <div class="card-body">
            @if(Session::has('message'))
              <p class=" pb-3 alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            {!! Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\Auth\PasswordResetController@store']) !!}

            <div class="form-group">
              {!! Form::label('email', 'Email:') !!}
              {!! Form::email('email', null, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
              {!! Form::submit('Sent Email', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
