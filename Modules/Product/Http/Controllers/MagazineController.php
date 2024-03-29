<?php

namespace Modules\Product\Http\Controllers;

use Modules\Product\Entities\Magazine;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;

class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('product::index');
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
        //
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
        $product = Product::where('id', $id)->first();
        // dd($product->name);

        $magazines = Magazine::orderBy('updated_at', 'DESC')->where('product_id', $id)->get();
        return view('product::product_quantity_edit', compact('product', 'magazines'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        // dd($request->action_used);

        $product = Product::where('id', $id)->first();



        // dd($request->action_used == 1);

        if ($request->action_used == 1) {
            // dd('sei in addizione');
            // dd($product->name);
            $product->stock_quntity += $request->quantity_product_add_or_sub;

            $save_product_quantity_magazine = $product->stock_quntity;

            // dd($product->stock_quntity);

            $product->save();
        } elseif ($request->action_used == 0) {

            // validation for subtract 

            if ($product->stock_quntity < $request->quantity_product_add_or_sub) {
                return redirect()->route('product_magazine.edit', compact('id'))->with('success', 'Hai richiesto di riumuovere una quantità superiore a quella disponibile');
            }


            // dd('sei in sottrazione');

            // dd($product->name);
            $product->stock_quntity -= $request->quantity_product_add_or_sub;

            $save_product_quantity_magazine = $product->stock_quntity;

            // da implementare regola che se mette un valore troppo alto che porta in negativo 

            // dd($product->stock_quntity);

            $product->save();
        }


        $magazine = new Magazine();


        $magazine->product_id = $product->id;
        $magazine->stock_quntity = $save_product_quantity_magazine;
        $magazine->quantity_product_add_or_sub = $request->quantity_product_add_or_sub;
        $magazine->action_used = $request->action_used;

        $magazine->save();

        return redirect()->route('product_magazine.edit', compact('id'));
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
}
