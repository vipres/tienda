<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Provider;
use Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.product.create', compact('categories', 'providers'));
    }

    public function store(StoreRequest $request)
    {
        if($request->hasFile('image')){
            $file = $request->file('image');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->storeAs('image', $image_name);
            $product = $request->all();
            $product['image'] = $image_name;
            $product = Product::create($product);

        }else{
            $product = $request->all();
            $product['image'] = null;
            $product = Product::create($product);
        }

        $product->update(['code' => $product->id]);
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::get();
        $providers = Provider::get();

        return view('admin.product.edit', compact('product','categories', 'providers'));
    }

    public function update(UpdateRequest $request, Product $product)
    {
        //imagen antigua
       $old = $product->image;
        //Si viene un archivo en el requuest
        if($request->hasFile('image')){
            $file = $request->file('image');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->storeAs('image', $image_name);
            $data = $request->all();
            $data['image'] = $image_name;
            $product->update($data);
            if($old){
                unlink(storage_path('app\public\image\\'.$old));
            }

            //Si el campo viene en blanco pero habia una imagen
            //Que no se modifica la imagen
        }elseif($request->image == null && $old != null){

            $data = $request->all();
            $data['image'] = $old;
            $product->update($data);

            //Si desde el principio no se grabo imagen, se modifica y sigue
            //sin imageb
        }else{
            $data = $request->all();
            $data['image'] = null;
            $product->update($data);
        }

        //$product->update(['code' => $product->id]);
        //$product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function change_status(Product $product)
    {
        if ($product->status == 'ACTIVE') {
            $product->update(['status'=>'DEACTIVATED']);
            return redirect()->back();
        } else {
            $product->update(['status'=>'ACTIVE']);
            return redirect()->back();
        }
    }
}
