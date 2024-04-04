<?php

namespace Modules\Orders\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $products = Product::all();
        return view('orders::index', compact('products'));
    }

    public function order_create(Request $request)
    {
        // $product = $request->all();
        // dd($product);

        $ids = $request->input('ids');

        $products = Product::whereIn('id', $ids)->get();

        // dd($products);


        $redirectUrl = route('order.cart'); // Sostituisci con l'URL di destinazione desiderato
        // return response()->json([
        //     'success' => true,
        //     'redirectUrl' => $redirectUrl
        // ]);

        return view('orders::cart', compact('products'));
        // return view('orders::cart')->with('products', $products);
        // return redirect()->route('order.cart', ['products' => $products]);

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('orders::create');
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
        return view('orders::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit()
    {
        return view('orders::edit');
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
}
