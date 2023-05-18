<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use App\Models\Product;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function getApi($route)
    {
        $url= 'https://friendly-shtern.82-223-54-48.plesk.page'; //URL de la api
        $uri= $url.$route;

        $client = new Client(['base_uri' => $uri]); //URL de la api + Funcion
        return $client;
    }




     public function index() //('providers',[Api\ProductController::class, 'index']);
    {
        $api= 'api/providers';

        $client= $this->getApi($api);
        $response = $client->request('GET', 'providers');

        $providers = json_decode($response->getBody()->getContents());
        return view('providers.index', ['providers' => $providers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('providers.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // ('providers/create',[Api\ProductController::class, 'store']);
    {
        $api= 'api/providers/create';

        $client= $this->getApi($api);
        $data=$request->validate([
            'name' => 'required',
            'company_name' => 'required',
            'phone' => 'required',
           
        ]);

        $response = $client->request('POST', 'providers/', [

            'form_params' =>
            [
                'name' => $data['name'],
                'company_name' => $data['company_name'],
                'phone' => $data['phone'],
            ]
        ]);
        return redirect()->route('providers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id) //('providers/{id}',[Api\ProductController::class, 'show']);
    {
        $api= 'api/providers/'.$id;

        $client= $this->getApi($api);
        $response = $client->request('GET', 'providers');

        $providers = json_decode($response->getBody()->getContents());
        return view('providers.show', ['providers' => $providers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('providers.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //('providers/update/{id}',[Api\ProductController::class, 'update'])
    {
        $api= 'api/providers/update/'.$id;

        $client= $this->getApi($api);

        $data=$request->validate([
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'category' => 'required',
        ]);

        $response = $client->request('PUT', 'providers/', [

                'form_params' =>
                [
                    'name' => $data['name'],
                    'price' => $data['price'],
                    'description' => $data['description'],
                    'category' => $data['category'],
                ]

        ]);

        return redirect()->route('providers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function destroy($id) //('providers/delete/{id}',[Api\ProductController::class, 'destroy'])
    {
        $api= 'api/providers/delete/'.$id;

        $client= $this->getApi($api);
        $response = $client->request('DELETE', 'providers/' . $id);

        return redirect()->route('providers.index');
    }
}
