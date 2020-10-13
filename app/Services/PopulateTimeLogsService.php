<?php


namespace App\Services;


use App\Repositories\AbstractRepository;
use App\Repositories\TimeLogRepository;
use App\Repositories\UserRepository;
use GuzzleHttp\Client;

class PopulateTimeLogsService extends PopulateAbstractService
{
    /**
     * Construtor da classe, responsável por fazer as injeções de dependencia
     * PopulateTimeLogsService constructor.
     * @param TimeLogRepository $timeLogRepository
     */
    public function __construct(TimeLogRepository $timeLogRepository)
    {
        $this->repositoryInterface = $timeLogRepository;
    }

    /**
     * Método responsável por executar a responsabilidade da classe
     * @return \Exception|mixed|void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function execute()
    {
        try{
            $client = new Client();
            $response = $client->request('GET', env('API_URL')."/timelogs", []);
            if($response->getStatusCode() == 200){
                $jsonResponse = json_decode($response->getBody());
                $this->insertInDatabase($jsonResponse, $this->repositoryInterface);
                return $jsonResponse;
            }else{
                throw new \Exception('Erro no service de timelog', 500);
            }

        }catch (\Exception $e){
            return $e;
        }
    }
}
