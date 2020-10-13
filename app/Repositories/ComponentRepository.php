<?php


namespace App\Repositories;


use App\Interfaces\RepositoryInterface;
use App\Models\Component;

class ComponentRepository extends AbstractRepository
{
    /**
     * Construtor da classe responsável por setar o tipo de objeto herdado pela classe pai
     * ComponentRepository constructor.
     * @param Component $component
     */
    public function __construct(Component $component)
    {
        $this->model = $component;
    }
}
