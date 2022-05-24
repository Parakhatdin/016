<?php

namespace App\Http\Controllers;

use App\Criteria\PivotQuantityCriteriaCriteria;
use App\Http\Requests\FindByPivotRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Repositories\Order\OrderRepository;
use App\Services\Order\OrderService;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    private OrderRepository $repository;
    private OrderService $orderService;

    /**
     * @param OrderRepository $repository
     * @param OrderService $orderService
     */
    public function __construct(OrderRepository $repository, OrderService $orderService)
    {
        $this->repository = $repository;
        $this->orderService = $orderService;
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
     * @param StoreOrderRequest $request
     * @return JsonResponse
     */
    public function store(StoreOrderRequest $request): JsonResponse
    {
        $requestData = $request->all();
        $product = $this->orderService->store($requestData);
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
     * @param UpdateOrderRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateOrderRequest $request, $id): JsonResponse
    {
        $requestData = $request->all();
        $product = $this->orderService->update($requestData, $id);
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
