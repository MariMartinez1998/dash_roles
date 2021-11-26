<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

class BlogController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-service|crear-service|editar-service|borrar-service')->only('index');
         $this->middleware('permission:crear-service', ['only' => ['create','store']]);
         $this->middleware('permission:editar-service', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-service', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         //Con paginación
         $blogs = Blog::paginate(5);
         return view('blogs.index',compact('blogs'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'image' => 'required|image|mimes:png,jpg,PNG,JPG|max:1024'
        ]);
    
        $producto = $request->all();
    
        if($imagen = $request->file('image')){
            $rutaGuardarImagen = 'imagen/';
            $imgServ = date('YmdHis'). ".". $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImagen, $imgServ);
            $producto['image'] = "$imgServ";
        }

        Blog::create($producto);
        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blogs.editar',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
         request()->validate([
            'titulo' => 'required', 'contenido' => 'required', ]);
    
            $prod = $request->all();
    
            if($imagen = $request->file('image')){
                $rutaGuardarImagen = 'imagen/';
                $imgServ = date('YmdHis'). ".". $imagen->getClientOriginalExtension();
                $imagen->move($rutaGuardarImagen, $imgServ);
                $prod['image'] = "$imgServ";
            }else{
                unset($prod['image']);
            }
    
            $blog->update($prod);
            return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
    
        return redirect()->route('blogs.index');
    }
}
