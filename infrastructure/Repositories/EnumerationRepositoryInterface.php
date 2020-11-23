<?php

namespace Infrastructure\Repositories;

interface EnumerationRepositoryInterface
{
    public function exists($id): bool;

    public function findById($id);

    public function create($data);
}
