<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepository;

class ProductServiceImpl implements ProductService
{
    private ProductRepository $repository;

    /**
     * @param ProductRepository $repository
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }


    public function store(array $data)
    {
        try {
            return $this->repository->create($data);
        } catch (\Throwable $e) {
            throw new \JsonException($e->getMessage());
        }
    }

    public function update(array $data, $id)
    {
        try {
            return $this->repository->update($data, $id);
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
        // TODO: Implement findById() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
