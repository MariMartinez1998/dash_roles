@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Services</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-service')
                        <a class="btn btn-warning" href="{{ route('Service.create') }}">New</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Titulo</th>
                                    <th style="color:#fff;">Contenido</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($services as $service)
                            <tr>
                                <td style="display: none;">{{ $service->id }}</td>                                
                                <td>{{ $service->title }}</td>
                                <td>{{ $service->description }}</td>
                                <td>
                                    <form action="{{ route('Service.destroy', $service->id) }}" method="POST">                                        
                                        @can('editar-service')
                                        <a class="btn btn-info" href="{{ route('Service.edit',$service->id) }}">Edit</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-service')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $services->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection