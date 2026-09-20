<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->get('http://127.0.0.1:8001/api/products/');

            $products = json_decode($response->getBody(), true);

        } catch (\Exception $e) {

            $products = [];
        }

        return view('home', [
            'products' => $products
        ]);
    }
}