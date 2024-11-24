<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ServicioSaved; #manual
use Intervention\Image\Facades\Image;#manual
use Illuminate\Support\Facades\Storage;#manual
use App\Models\Servicio;
use App\Models\Category;
use App\Http\Requests\CreateServicioRequest;

class Servicios2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $servicios= Servicio::oldest('id')->paginate(4);
        // return view('servicios',compact('servicios'));//
        return view('servicios', [
            'servicios' => Servicio::with('category')->latest()->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create',[
            'servicio'=>new Servicio,
            'categories' => Category::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateServicioRequest $request)
    {   /*Primer metodo plicado
         $titulo=request('titulo');
         $descripcion=request('descripcion');
         Servicio::create([
             'titulo'=>$titulo,
            'descripcion'=>$descripcion
         ]);
         return redirect()->route('servicios');

        Segundo metodo
        $camposv=request()->validate([
             'titulo'=>'required',
             'descripcion'=>'required'
         ]);
         Servicio::create($camposv);
         return redirect()->route('servicios');

        Tercer metodo
        Servicio::create($request->validated());
        return redirect()->route('servicios')->with('success', 'Service created successfully!');
        */
        
            // Servicio::create($request->validated());
            // return redirect()->route('servicios')->with('success', 'Service created successfully!');
            //OTRO METODO
            $servicio = new Servicio($request->validated());
            $servicio->image = $request->file('image')->store('images');
            $servicio->save();

            $image = Image::make(storage::get($servicio->image))
                ->widen(600) //Redimensionamos la imagen a 600 px
                ->limitColors(255) //Limitamos el color a 255
                ->encode(); //Volvemos a codificar la nueva imagen
            //Sobreescribimos la misma imagen con la nueva imagen redimensionada
            Storage::put($servicio->image, (string) $image);
            ServicioSaved::dispatch($servicio);
            return redirect()->route('servicios.index')->with('estado','El servicio fue creado correctamente');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('show',[
            'servicio'=>Servicio::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    //funcion de editar envia un servicio
    public function edit(Servicio $servicio)
    {
        return view('editar', [
            'servicio'=>$servicio,
            'categories' =>Category::pluck('name', 'id')
        ]);
        //
    }


    /**
     * Update the specified resource in storage.
     */
    //funcion modificar
    public function update(Servicio $servicio, CreateServicioRequest $request)
    {
        // $servicio->update($request->validated());
        // OTRO METODO: $servicio->update(array_filter($request->validated()));
        // OTROs METODO:
        if($request->hasFile('image')) {// Si enviamos un imagen
            Storage::delete($servicio->image); //LE PASAMOS LA UBICACION DE LA IMAGEN
            $servicio->fill($request->validated()); //Rellena todos los datos sin guardarlos
            $servicio->image = $request->file('image')->store('images'); //Le asignamos La imagen que sube
            $servicio->save(); //Finalmente guardamos en La Base de datos
            
            $image = Image::make(storage::get($servicio->image))
                ->widen(600) //Redimensionamos la imagen a 600 px
                ->limitColors(255) //Limitamos el color a 255
                ->encode(); //Volvemos a codificar la nueva imagen
            //Sobreescribimos la misma imagen con la nueva imagen redimensionada
            Storage::put($servicio->image, (string) $image);
            ServicioSaved::dispatch($servicio);

        }else{
            $servicio->update( array_filter($request->validated()));
        }
        return redirect()->route('servicios.show', $servicio)->with('estado','El servicio fue actualizado correctamente');
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    //funcion eliminar 
    public function destroy(Servicio $servicio)
    {
        Storage::delete($servicio->image); //LE PASAMOS LA UBICACION DE LA IMAGEN
        
        $servicio->delete();

        // return redirect()->route('servicios');//
        return redirect()->route('servicios.index')->with('estado','El servicio fue eliminado correctamente');
    }

    public function __construct(){
        // $this->middleware('auth')->only('create','edit');
        $this->middleware('auth')->except('index','show');

    }
}
