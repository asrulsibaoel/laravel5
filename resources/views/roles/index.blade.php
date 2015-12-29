@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('roles.list_roles')}}</div>

                <div class="panel-body">
                    <a class="btn btn-small btn-success" href="{{ URL::to('roles/create') }}">{{trans('roles.new_roles')}}</a>
                    <hr />
                    @if (Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>{{trans('roles.id')}}</td>
                                <td>{{trans('roles.name')}}</td>
                                <td>{{trans('roles.access')}}</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->access }}</td>
                                <td>
                                    <a class="btn btn-small btn-info" href="{{ URL::to('roles/' . $value->id . '/edit') }}">{{trans('roles.edit')}}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection