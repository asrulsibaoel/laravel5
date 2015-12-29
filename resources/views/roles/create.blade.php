@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Hak Akses</div>

                <div class="panel-body">

                    <hr />
                    @if (Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif

                    {!! Html::ul($errors->all()) !!}

                    {!! Form::open(array('url' => 'roles', 'files' => true)) !!}
                    <div class="form-group">
                        {!! Form::label('name', trans('roles.name').' *') !!}
                        {!! Form::text('name', Input::old('name'), array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <div class="form-group">{!! Form::label('access', trans('roles.access').' *') !!}</div>
                        <div class="img-thumbnail">
                            @foreach($department as $value)
                            <div class="form-group">
                                {!! Form::checkbox('access[]', $value->id) !!}
                                {!! Form::label('name', $value->name) !!}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {!! Form::submit(trans('roles.submit'), array('class' => 'btn btn-primary')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection