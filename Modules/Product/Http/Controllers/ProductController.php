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
        // $numberDead = Product::where('creator_id', $user)->get()->onlyTrashed()->count();
        // $numberDead = Product::withTrashed()->where('creator_id', $user)->count('id');

        return view('product::index', compact('products'));
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

            // dd('ciao');

            $path = Storage::put('public/product_image', $request->product_image);

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
    public function edit($id)
    {
        return view('product::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }


    public function trash()
    {
        $products = Product::onlyTrashed()->get();

        // dd($users);

        return view('product::trash', compact('products'));
    }


    public function force_delete(Int $id)
    {
        // query lunga per risolvere il problema della dipendence injection 
        $product = Product::where('id', $id)->onlyTrashed()->first();

        // if ($user->id === auth()->user()->id) {
        //     return abort(403);
        // }

        $product->forceDelete();

        return redirect()->route('product.index');
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
