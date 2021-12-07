@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Users</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <a href="{{ route('Users.create') }}" class="btn btn-warning">New</a>

                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef;">
                                
                                <th sytyle="color: #fff;">Name</th>
                                <th sytyle="color: #fff;">E-mail</th>
                                <th sytyle="color: #fff;">Rol</th>
                                <th sytyle="color: #fff;">Actions</th>
                                </thead>

                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td style="display: none;">{{$user->id}}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if (!empty($user->getRolenames()))
                                                @foreach ( $user->getRolenames() as $rolName )
                                                <h5><span class="badge badge-dark">{{ $rolName }}</span></h5>
                                                    
                                                @endforeach
                                            @endif
                                        </td>

                                        <td> 
                                            <a href="{{ route('Users.edit', $user->id) }}" class="btn btn-info">Edit</a>

                                        {!! Form::open(['method' => 'DELETE', 'route'=>['Users.destroy',$user->id], 'style'=>'display:inline']) !!}
                                            {!! Form::submit('Borrar', ['class'=> 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="pagination justify-content-end">
                                {!! $users-> links() !!}
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

