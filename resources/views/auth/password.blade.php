@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Reset Password</div>
                    <div class="panel-body">
                        {!! Form::open(array('url' => url('password/email'), 'method' => 'post', 'files'=> true)) !!}
                        <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                            {!! Form::label('email', "E-Mail Address", array('class' => 'control-label')) !!}
                            <div class="controls">
                                {!! Form::text('email', null, array('class' => 'form-control')) !!}
                                <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                        {!! FOrm::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
