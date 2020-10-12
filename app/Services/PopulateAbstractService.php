<?php


namespace App\Services;


use App\Interfaces\PopulateInterface;
use App\Interfaces\RepositoryInterface;
use App\Repositories\AbstractRepository;

class PopulateAbstractService implements PopulateInterface
{
    protected $repositoryInterface = RepositoryInterface::class;

    /**
     * @inheritDoc
     */
    public function execute()
    {

    }

    /**
     * @param $json
     * @param AbstractRepository $repository
     * @return mixed|void
     */
    function insertInDatabase($json, $repository)
    {
        foreach ($json as $object){
            $repository->save((array)$object);
        }
    }
}
