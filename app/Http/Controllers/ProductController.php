<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\Product\ProductRepository;
use App\Services\Product\ProductService;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    private ProductRepository $repository;
    private ProductService $service;

    /**
     * @param ProductRepository $repository
     * @param ProductService $productService
     */
    public function __construct(ProductRepository $repository, ProductService $productService)
    {
        $this->repository = $repository;
        $this->service = $productService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $products = $this->repository->all();
        return response()->json([
            'data' => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return JsonResponse
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        $requestData = $request->all();
        $product = $this->service->store($requestData);
        return response()->json([
            'data' => $product,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $product = $this->repository->find($id);
        return response()->json([
            'data' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateProductRequest $request, $id): JsonResponse
    {
        $requestData = $request->all();
        $product = $this->service->update($requestData);
        return response()->json([
            'data' => $product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $deleted = $this->repository->delete($id);

        return response()->json([
            'message' => 'Product deleted.',
            'deleted' => $deleted,
        ]);
    }
}
