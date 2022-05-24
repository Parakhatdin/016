<?php

namespace App\Services\Order;

use App\Models\Order;
use App\Repositories\Order\OrderRepository;
use Illuminate\Support\Arr;

class OrderServiceImpl implements OrderService
{
    private OrderRepository $repository;

    /**
     * @param OrderRepository $repository
     */
    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(array $data)
    {
        try {
            $products = Arr::get($data, "products");
            /** @var Order $order */
            $order = $this->repository->create(["user_id" => 1]);
            foreach ($products as $product) {
                $order->products()->attach($product);
            }
            return $order;
        } catch (\Throwable $e) {
            throw new \JsonException($e->getMessage());
        }
    }

    public function update(array $data, $id)
    {
        try {
            $products = Arr::get($data, "products");
            /** @var Order $order */
            $order = $this->repository->find($id);
            $order->products()->sync($products);
            return $order;
        } catch (\Throwable $e) {
            throw new \JsonException($e->getMessage());
        }
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function findById($id)
    {
        // TODO: Implement delete() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
