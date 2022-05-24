<?php

namespace App\Services;

interface BaseCrudService
{
    public function all();
    public function store(array $data);
    public function findById($id);
    public function update(array $data, $id);
    public function delete($id);
}
