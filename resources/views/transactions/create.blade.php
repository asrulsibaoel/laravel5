@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Transaksi</div>

                <div class="panel-body">

                    <hr />
                    @if (Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif

                    <form method="POST" action="/transactions/create">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">{!! Form::label('access', trans('transactions.access').' *') !!}</div>
                            <div class="img-thumbnail">
                                @foreach($department as $value)
                                <div class="form-group">
                                    {!! Form::checkbox('access[]', $value->id) !!}
                                    {!! Form::label('name', $value->name) !!}
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection