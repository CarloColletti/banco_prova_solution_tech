<?php

namespace Modules\Product\Http\Controllers;

use App\Models\User;
use Modules\Product\Entities\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user = Auth::id();
        $products = Product::where('creator_id', $user)->get();
        // $products = Product::all();
        $numberDead = Product::where(
            'creator_id',
            $user
        )->onlyTrashed()->get()->count();

        $resul_error_fix = null;

        if ($products->count() === 0) {
            $resul_error_fix = 0;
        }

        // dd($products);

        return view('product::index', compact('products', 'numberDead', 'resul_error_fix'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('product::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $form_data = $request->all();

        // dd($request->all());

        $this->validation($form_data);

        $product = new Product();

        if ($request->hasFile('product_image')) {

            // dd($request->product_image);

            $path = Storage::put('public/product_image', $request->product_image);

            // dd($path);

            $image_path = str_replace('public/', '', $path);

            // dd($image_path);


            $form_data['product_image'] = $image_path;

            $product->product_image = $form_data['product_image'];
        }
        $product->creator_id = Auth::id();

        $product->fill($form_data);

        // dd($product);

        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('product::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request, $id)
    {

        $product = Product::findOrFail($id);

        $id_for_update_link = route('product.update', ['id' => $product->id]);
        $id_for_delete_link = route('product.destroy', ['id' => $product->id]);

        // dd($id_for_update_link);
        // dd($id_for_delete_link);
        if ($product->product_image) {
            $url_image = Storage::url($product->image);
        } else {
            $url_image = null;
        }

        // dd($product);
        return response()->json(['success' => compact(
            'product',
            'id_for_update_link',
            'url_image',
            'id_for_delete_link',
        )]);
        // return view('product::layouts.partials._modal_edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Product $product, $id)
    {
        $form_data = $request->all();

        // dd($request->all());

        $this->validation($form_data);

        $product = Product::findOrFail($id);

        // dd($product);

        if ($request->hasFile('product_image')) {

            // dd('ciao');
            if ($product->product_image) {
                Storage::delete($product->product_image);
            }

            $path = Storage::put('public/product_image', $request->product_image);

            // dd($product->product_image);

            $image_path = str_replace('public/', '', $path);

            // dd($image_path);


            $form_data['product_image'] = $image_path;

            $product->product_image = $form_data['product_image'];
        }
        $product->creator_id = Auth::id();

        $product->fill($form_data);

        // dd($product);

        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::findOrFail($id);


        if ($product->creator_id != auth()->user()->id) {
            return abort(403);
        }

        $product->delete();


        return redirect()->route('product.index');
    }


    public function trash()
    {
        // $products = Product::onlyTrashed()->get();

        $user = Auth::id();
        $products = Product::where('creator_id', $user)->onlyTrashed()->get();

        // dd($products);
        if (isset($products->attributes)) {
            dd('vuoto');
            return redirect()->route('product.index')->with('success', 'Il cimitero è vuoto');
        }

        $resul_error_fix = null;

        if (
            $products->count() === 0
        ) {
            $resul_error_fix = 0;
        }

        // dd($users);

        return view('product::trash', compact('products', 'resul_error_fix'));
    }

    public function returnIdForForceDelete($id)
    {

        $id_for_force_delete_link = route('product.force_delete', ['id' => $id]);
        // dd($id_for_force_delete_link);

        return response()->json(['success' => compact(
            'id_for_force_delete_link'
        )]);
    }


    public function force_delete(Int $id)
    {
        // query lunga per risolvere il problema della dipendence injection 
        $product = Product::where('id', $id)->onlyTrashed()->first();

        $user = Auth::id();

        if ($user != auth()->user()->id) {
            return abort(403);
        }

        // dd($product->product_image);
        if ($product->product_image) {
            // dd("stai eliminando l'immagine");

            Storage::delete($product->product_image);
        }

        $product->forceDelete();

        return redirect()->route('product.trash');
    }

    public function restore(Int $id)
    {
        // query lunga per risolvere il problema della dipendence injection 
        // $user = User::where('id', $id)->onlyTrashed()->first();

        // $user->restore();

        return redirect()->route('product.index');
    }



    private function validation($form_data)
    {
        $validator = Validator::make(
            $form_data,
            [
                'name' => 'required|min:2|max:30',
                'type' => 'required|min:2|max:20',
                'weight' => 'nullable',
                'height' => 'nullable',
                'width' => 'nullable',
                'depth' => 'nullable',
                'stock_quntity' => 'required|integer',
                'product_image' => 'nullable|image',
                'price' => 'required|numeric|between:0.00,9999.99',
            ],
            [
                //name
                'name.required' => 'Inserire il nome',
                'name.max' => 'Il nome è troppo lungo',
                'name.min' => 'Il nome è troppo corto',

                //type
                'type.required' => 'Inserire il cognome',
                'type.min' => 'Il cognome è troppo piccolo',
                'type.max' => 'Il cognome è troppo grande',

                //stock_quntity
                'stock_quntity.required' => 'Inserire la quantà del prodotto',
                'stock_quntity.integer' => 'Inserisci un numero valido (numero intero)',

                //product_image
                'product_image.image' => "Il file deve essere in'immagine",

                //price
                'price.requider' => 'Inserire un prezzo al prodotto',
                'price.numeric' => 'Il valore deve essere un numero',
                'price.between' => 'Il valore deve essere un numero valido',



            ]
        )->validate();
    }
}
