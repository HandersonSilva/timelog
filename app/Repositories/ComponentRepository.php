<?php


namespace App\Repositories;


use App\Interfaces\RepositoryInterface;
use App\Models\Component;

class ComponentRepository extends AbstractRepository
{
    public function __construct(Component $component)
    {
        $this->model = $component;
    }
}
