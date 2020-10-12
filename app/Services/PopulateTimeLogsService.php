<?php


namespace App\Services;


use App\Repositories\AbstractRepository;
use App\Repositories\TimeLogRepository;
use App\Repositories\UserRepository;
use GuzzleHttp\Client;

class PopulateTimeLogsService extends PopulateAbstractService
{
    public function __construct(TimeLogRepository $timeLogRepository)
    {
        $this->repositoryInterface = $timeLogRepository;
    }

    /**
     * @inheritDoc
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
                throw new \Exception('Erro no endpoint de component', 500);
            }

        }catch (\Exception $e){
            return $e;
        }
    }
}
