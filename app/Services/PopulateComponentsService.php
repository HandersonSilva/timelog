<?php


namespace App\Services;

use App\Interfaces\PopulateInterface;
use App\Interfaces\RepositoryInterface;
use App\Repositories\ComponentRepository;
use GuzzleHttp\Client;

class PopulateComponentsService extends PopulateAbstractService
{
    /**
     * Construtor da classe, responsável por fazer as injeções de dependencia
     * PopulateComponentsService constructor.
     * @param ComponentRepository $componentsRepository
     */
    public function __construct(ComponentRepository $componentsRepository)
    {
        $this->repositoryInterface = $componentsRepository;
    }

    /**
     * Método que executa a responsabilidade da classe
     * @return \Exception|mixed|void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function execute()
    {
        try{
            $client = new Client();
            $response = $client->request('GET', env('API_URL')."/components", []);
            if($response->getStatusCode() == 200){
                $jsonResponse = json_decode($response->getBody());
                $this->insertInDatabase($jsonResponse, $this->repositoryInterface);
                return $jsonResponse;
            }else{
                throw new \Exception('Erro no service de component', 500);
            }

        }catch (\Exception $e){
            return $e;
        }
    }

}
