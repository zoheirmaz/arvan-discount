<?php

namespace App\Repositories;

use App\Entities\Enumeration;
use Infrastructure\Traits\QueryTrait;
use Infrastructure\Traits\EntityRelationsTrait;
use Infrastructure\Repositories\EnumerationRepositoryInterface;

class EnumerationRepository implements EnumerationRepositoryInterface
{
    use EntityRelationsTrait, QueryTrait;

    public function exists($id): bool
    {
        return Enumeration::query()
            ->where(File::ID, $id)
            ->exists();
    }

    public function findById($id)
    {
        return Enumeration::query()
            ->with($this->enumerationRelations())
            ->findOrFail($id);
    }

    public function create($data)
    {
        return Enumeration::create([
            Enumeration::TITLE => $data['title'],
            Enumeration::PARENT_ID => $data['title'],
        ]);
    }
}
