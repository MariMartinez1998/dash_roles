@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Vista Cliente</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Name</th>
                                    <th style="color:#fff;">Title</th>
                                    <th style="color:#fff;">Description</th> 
                                    <th style="color:#fff;">Check-in Time</th> 
                                    <th style="color:#fff;">Email</th> 
                                    <th style="color:#fff;">Image</th>          
                                                                                                     
                              </thead>
                              <tbody>
                            @foreach ($blog as $blogs)
                            <tr>
                                <td style="display: none;">{{ $blogs->id }}</td>  
                                <td>{{ $blogs->name }}</td>                              
                                <td>{{ $blogs->titulo }}</td>
                                <td>{{ $blogs->contenido }}</td>
                                <td>{{  $blogs->created_at }}</td>
                                <td>{{  $blogs->email }}</td>
                                <td class="border px-14 py-1">
                                    <img src="/imagen/{{ $blogs->image }}" height="150" alt="">
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
    </section>
@endsection
