<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $perPage = $request->input('length', 10);
        $page = $request->input('start', 0) / $perPage + 1;
        $searchTerm = $request->input('search.value', '');

        $productsQuery = Product::query();

        if ($searchTerm) {
            $productsQuery->where('title', 'like', '%' . $searchTerm . '%')
                ->orWhere('description', 'like', '%' . $searchTerm . '%');
        }

        $products = $productsQuery->paginate($perPage);

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $products->total(),
            'recordsFiltered' => $products->total(),
            'data' => $products->items(),
        ]);
    }





    public function store(ProductRequest $request)  //data been validated through ProductRequest
    {
        try {
            $product = Product::create($request->validated());

            return response()->json([
                'success' => true,
                'data' => $product,
                'message' => 'Product created successfully',
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors(),
                'message' => 'Validation failed during product creation.',
            ], 422);
        }
    }

    public function show($id)
    {
        $product = Product::with('category')->find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $product,
            'message' => 'Product retrieved successfully',
        ], 200);
    }

    public function update(ProductRequest $request, $id)
    {
        try {
            $product = Product::find($id);

            if (!$product) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product not found',
                ], 404);
            }

            $product->update($request->validated());

            return response()->json([
                'success' => true,
                'data' => $product,
                'message' => 'Product updated successfully',
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors(),
                'message' => 'Validation failed during product update.',
            ], 422);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
            ], 404);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully',
        ], 200);
    }
}
