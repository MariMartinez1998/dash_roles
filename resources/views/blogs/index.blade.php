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
                
            
                        @can('create-service')
                        <a class="btn btn-warning" href="{{ route('blogs.create') }}">New</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Title</th>
                                    <th style="color:#fff;">Description</th> 
                                    
                                    <th style="color:#fff;">Image</th>          
                                    <th style="color:#fff;">Actions</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($blogs as $blog)
                            <tr>
                                <td style="display: none;">{{ $blog->id }}</td>                                
                                <td>{{ $blog->titulo }}</td>
                                <td>{{ $blog->contenido }}</td>
                               
                                <td class="border px-14 py-1">
                                    <img src="/imagen/{{ $blog->image }}" height="150" alt="">
                                </td>
                                <td>
                                    <form action="{{ route('blogs.destroy',$blog->id) }}" method="POST">                                        
                                        @can('edit-service')
                                        <a class="btn btn-info" href="{{ route('blogs.edit',$blog->id) }}">Edit</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('delete-service')
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
                            {!! $blogs->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
