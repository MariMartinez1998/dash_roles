@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Edit Service</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                            
                   
                        @if ($errors->any())                                                
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Check the fields!</strong>                        
                                @foreach ($errors->all() as $error)                                    
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif


                    <form action="{{ route('blogs.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="id_users">Id del usuario</label>
                                   <input type="text" name="id_users" class="form-control" value="{{ $blog->id_users }}">
                                </div>
                            </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="titulo">Title</label>
                                   <input type="text" name="titulo" class="form-control" value="{{ $blog->titulo }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                    
                                <div class="form-floating">
                                <label for="contenido">Description</label>
                                <textarea class="form-control" name="contenido" style="height: 100px">{{ $blog->contenido }}</textarea>     
                                
                                
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">                  
                                <div class="form-floating">
                               <img id="imagenSeleccionada" style="max-height:300px;" src="/imagen/{{ $blog->image }}">
                                </div>

                                <div class="form-floating">
                                <label for="image">Update Image <br>
                                <input type="file" id="image" name="image" class="hidden">
                                </label>
                                
        

                                </div>
                            </div>
                                </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Save</button>                            
                        </div>
                    </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(e){
            $('#image').change(function(){
                let reader = new FileReader();
                reader.onload = (e) =>{
                    $('#imagenSeleccionada').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection
