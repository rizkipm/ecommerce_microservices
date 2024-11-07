<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    // Dummy data
    private $cartItems = [
        [
            "id" => 1,
            "name" => "Produk 1",
            "quantity" => 1,
            "price" => 1000
        ],
        [
            "id" => 2,
            "name" => "Produk 2",
            "quantity" => 76,
            "price" => 76000
        ],
        [
            "id" => 3,
            "name" => "Produk 3",
            "quantity" => 4,
            "price" => 756
        ],
    ];

    // Endpoint untuk menampilkan semua cart items
    public function index()
    {
        try {
            return response()->json($this->cartItems);
        } catch (\Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'file'    => $th->getFile(),
                'line'    => $th->getLine()
            ]);
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    // Endpoint untuk menampilkan cart item berdasarkan ID
    public function show($id)
    {
        try {
            $productCart = array_reduce($this->cartItems, function ($total, $item) use ($id) {
                if ($item['id'] == $id) {
                    $total += $item['quantity'];
                }
                return $total;
            }, 0);

            return response()->json([
                "product" => $id,
                "quantity" => $productCart
            ]);
        } catch (\Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'file'    => $th->getFile(),
                'line'    => $th->getLine()
            ]);
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}