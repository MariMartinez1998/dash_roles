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
                        
                      @can('create-user')
                          <a class="btn btn-warning" href="{{ route('usuarios.create') }}">New</a>   
                          
                          @endcan
                         
                            <table class="table table-striped mt-2">
                              <thead style="background-color:#6777ef">                                     
                                  <th style="color:#fff;">ID</th>
                                  <th style="color:#fff;">Name</th>
                                  <th style="color:#fff;">Last name</th>
                                  <th style="color:#fff;">E-mail</th>
                                  <th style="color:#fff;">Rol</th>
                                  <th style="color:#fff;">Phone</th>
                                  <th style="color:#fff;">City</th>
                                  <th style="color:#fff;">Street</th>
                                  <th style="color:#fff;">State</th>
                                  <th style="color:#fff;">Zip Code</th>
                                  <th style="color:#fff;">Actions</th>                                                                   
                              </thead>
                              <tbody>
                                @foreach ($usuarios as $usuario)
                                  <tr>
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->last_name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                      @if(!empty($usuario->getRoleNames()))
                                        @foreach($usuario->getRoleNames() as $rolNombre)                                       
                                          <h5><span class="badge badge-dark">{{ $rolNombre }}</span></h5>
                                        @endforeach
                                      @endif
                                    </td>
                                    <td>{{ $usuario->phone }}</td>
                                    <td>{{ $usuario->city }}</td>
                                    <td>{{ $usuario->street }}</td>
                                    <td>{{ $usuario->state }}</td>
                                    <td>{{ $usuario->zip_code }}</td>
                                    <td>     
                                      
                                    @can('edit-user')                             
                                      <a class="btn btn-info" href="{{ route('usuarios.edit',$usuario->id) }}">Edit</a>
                                      @endcan

                                      @can('delete-user')
                                      {!! Form::open(['method' => 'DELETE','route' => ['usuarios.destroy', $usuario->id],'style'=>'display:inline']) !!}
                                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                      {!! Form::close() !!}
                                      @endcan
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                            <!-- Centramos la paginacion a la derecha -->
                          <div class="pagination justify-content-end">
                            {!! $usuarios->links() !!}
                          </div>     
                            
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
@endsection