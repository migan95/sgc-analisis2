<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Proveedor;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index')
            ->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::all('id', 'nombre')->sortBy('nombre');
        $proveedores = Proveedor::all('id', 'nombre_proveedor')->sortBy('nombre_proveedor');
        $categorias = Categoria::all('id', 'nombre')->sortBy('nombre');
        return view('productos.create')
            ->with('marcas', $marcas)
            ->with('proveedores', $proveedores)
            ->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => 'required',
            'descrip_producto' => 'required',
            'id_proveedor' => 'required',
            'num_existencias' => 'required',
            'precio_productos' => 'required',
            'sku' => 'required',
            'precio_compra' => 'required',
            'id_categoria' => 'required',
            'id_marca' => 'required',
            'imagen' => 'required'
        ]);

        $producto = Producto::create($request->all());
        if ($request->hasFile('imagen')) {
            $this->guardarImagen($producto, $request->file('imagen'));
        }

        return redirect()
            ->route('productos.index')
            ->with('mensaje', 'Producto creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        $categoria = Categoria::query()
            ->where('id', '=', $producto->id_categoria)
            ->limit(1)
            ->get('nombre');

        $marca = Marca::query()
            ->where('id', '=', $producto->id_marca)
            ->limit(1)
            ->get('nombre');

        $proveedor = Proveedor::query()
            ->where('id', '=', $producto->id_proveedor)
            ->limit(1)
            ->get('nombre_proveedor');

        return view('productos.show')
            ->with('producto', $producto)
            ->with('categoria', $categoria->isEmpty() ? '' : $categoria[0]->nombre)
            ->with('marca', $marca->isEmpty() ? '' : $marca[0]->nombre)
            ->with('proveedor', $proveedor->isEmpty() ? '' : $proveedor[0]->nombre_proveedor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $marcas = Marca::all('id', 'nombre')->sortBy('nombre');
        $proveedores = Proveedor::all('id', 'nombre_proveedor')->sortBy('nombre_proveedor');
        $categorias = Categoria::all('id', 'nombre')->sortBy('nombre');
        return view('productos.edit')
            ->with('producto', $producto)
            ->with('marcas', $marcas)
            ->with('proveedores', $proveedores)
            ->with('categorias', $categorias);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre_producto' => 'required',
            'descrip_producto' => 'required',
            'id_proveedor' => 'required',
            'num_existencias' => 'required',
            'precio_productos' => 'required',
            'sku' => 'required',
            'precio_compra' => 'required',
            'id_categoria' => 'required',
            'id_marca' => 'required'
        ]);

        $producto->update($request->all());

        if ($request->hasFile('imagen')) {
            $this->guardarImagen($producto, $request->file('imagen'));
        }

        return redirect()
            ->route('productos.index')
            ->with('mensaje', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        Storage::delete(str_replace('storage', 'public', $producto->imagen));
        $producto->delete();

        return redirect()
            ->route('productos.index')
            ->with('mensaje', 'Producto eliminado correctamente');
    }

    /**
     * Storage image for a product
     *
     * @param Producto $producto
     * @param File $imagen
     */
    public function guardarImagen(Producto $producto, UploadedFile $imagen)
    {
        $path = 'public/uploads/productos';
        $name = $producto->id . '.' . $imagen->clientExtension();
        if (Storage::exists($path . '/' . $name)) {
            Storage::delete($path . '/' . $name);
        }
        $imagen = Storage::putFileAs(
            $path,
            $imagen,
            $name
        );

        $producto->update([
            'imagen' => str_replace('public', 'storage', $imagen)
        ]);
    }
}
