@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">User Registration</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Check the changes!</strong>
                                        @foreach ($errors->all() as $error)
                                            <span class="badge badge-danger">{{$error}}</span>
                                        @endforeach

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hiden="true">&times;</span>
                                        </button>
                                </div>
                            @endif

                            {!! Form::open(array('route'=>'Users.store', 'method'=>'POST')) !!}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                          <label for="name">Name</label>
                                          {!!Form::text('name',null, array('class'=>'form-control'))  !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                          <label for="email">E-mail</label>
                                          {!!Form::text('email',null, array('class'=>'form-control'))  !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                          <label for="password">Password</label>
                                          {!!Form::password('password',null, array('class'=>'form-control'))  !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                          <label for="confirm-password">Confirm Password</label>
                                          {!!Form::password('confirm-password',null, array('class'=>'form-control'))  !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                          <label for="">Roles</label>
                                          {!!Form::select('roles[]', $roles, [], array('class'=>'form-control'))  !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

