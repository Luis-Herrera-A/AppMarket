<?php
namespace App\Http\Controllers\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Product\Mark;
use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\ProductUpdateRequest;

use Session;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::
        select('products.id','products.name as product','price','marks.name as mark')->join('marks','marks.id','=','products.marks_id')->paginate(5);
        return View('product/product')->with('products',$products);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marks = Mark::pluck('name','id')->prepend('Seecciona la marca');

        return View('product.create')->with('marks',$marks);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        //
      Product::create($request->all());
      Session::flash('save','Se Ha Creado un producto satisfactoriamente');
        return redirect()->route('product.index');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $products = Product::FindOrFail($id);
      return
      view('product.show')->with('products',$products);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $marks = Mark::pluck('name','id')->prepend('Selecciona la marca');
          $products= Product::FindOrFail($id);

          return view('product.edit', array('products'=>$products,'marks'=>$marks));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $products =Product::FindOrFail($id);
        $input =$request->all();
        $products->fill($input)->save();
        Session::flash('update','Se ha actualizado satisfactoriamente');
        return redirect()->route('product.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $products =Product::FindOrFail($id);
      $products->delete();
      Session::flash('delete','Se Ha eliminado un producto satisfactoriamente');
      return redirect()->route('product.index');
    }
}
