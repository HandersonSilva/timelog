<?php


namespace App\Services;


use App\Interfaces\PopulateInterface;
use App\Interfaces\RepositoryInterface;
use App\Repositories\AbstractRepository;

class PopulateAbstractService implements PopulateInterface
{
    protected $repositoryInterface = RepositoryInterface::class;

    /**
     * Método que será executado pelas classes filhas
     * @return mixed|void
     */
    public function execute()
    {

    }

    /**
     * Método responsável por inserir os dados no banco de dados
     * @param $json
     * @param $repository
     * @return mixed|void
     */
    function insertInDatabase($json, $repository)
    {
        foreach ($json as $object){
            $repository->save((array)$object);
        }
    }
}
