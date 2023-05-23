<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function getApi($route)
    {


        $url= 'https://friendly-shtern.82-223-54-48.plesk.page/'; //URL de la api
        $uri= $url.$route;

        $client = new Client([
            'base_uri' => $uri,
            'verify' => false // Deshabilitar la verificación SSL
        ]); //URL de la api + Funcion
        return $client;
    }




     public function index() //('products',[Api\ProductController::class, 'index']);
    {
        $api= 'api/products';

        $client= $this->getApi($api);
        $response = $client->request('GET', 'products');

        $productos = json_decode($response->getBody()->getContents());
        return view('productos.index', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // ('products/create',[Api\ProductController::class, 'store']);
    {
        $api= 'api/products/create';

        $client= $this->getApi($api);
        $data=$request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        $response = $client->request('POST', 'productos/', [

            'form_params' =>
            [
                'name' => $data['name'],
                'price' => $data['price'],
                'description' => $data['description'],
                'category' => $data['category'],
            ]
        ]);
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id) //('products/{id}',[Api\ProductController::class, 'show']);
    {
        $api= 'api/products/'.$id;

        $client= $this->getApi($api);
        $response = $client->request('GET', 'products');

        $productos = json_decode($response->getBody()->getContents());
        return view('productos.show', ['productos' => $productos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('productos.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //('products/update/{id}',[Api\ProductController::class, 'update'])
    {
        $api= 'api/products/update/'.$id;

        $client= $this->getApi($api);

        $data=$request->validate([
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'category' => 'required',
        ]);

        $response = $client->request('PUT', 'productos/', [

                'form_params' =>
                [
                    'name' => $data['name'],
                    'price' => $data['price'],
                    'description' => $data['description'],
                    'category' => $data['category'],
                ]

        ]);

        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function destroy($id) //('products/delete/{id}',[Api\ProductController::class, 'destroy'])
    {
        $api= 'api/products/delete/'.$id;

        $client= $this->getApi($api);
        $response = $client->request('DELETE', 'productos/' . $id);

        return redirect()->route('productos.index');
    }
}
