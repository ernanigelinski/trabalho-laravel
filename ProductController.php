<?php
  
namespace App\Http\Controllers\Admin;
  
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::latest()->paginate(5);
        $categories = Category::all();
        if ($request->ajax()) {
            return response()->json($products);
        }else{
            //return view('products.show',compact('product'));
            return view('admin.products.index',compact('products', 'categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ]);
        $categories = Category::all();
        Product::create($request->all());
        
        return redirect()->route('admin.products.index')
                        ->with('success','Product created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Request $request)
    {
        

        if ($request->ajax()) {
            return response()->json($products);
        }
            return view('admin.products.show',compact('product'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit',compact('product'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ]);
  
        $product->update($request->all());
  
        return redirect()->route('admin.products.index')
                        ->with('success','Product updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
  
        return redirect()->route('admin.products.index')
                        ->with('success','Product deleted successfully');
    }
}