<?php


namespace App\Services;


use App\Interfaces\RepositoryInterface;
use App\Repositories\ComponentRepository;
use App\Repositories\IssueComponentRepository;
use App\Repositories\IssueRepository;
use GuzzleHttp\Client;

class PopulateIssuesService extends PopulateAbstractService
{
    private $issueComponentRepository;

    public function __construct(IssueRepository $issueRepository,
                                IssueComponentRepository $issueComponentRepository)
    {
        $this->repositoryInterface = $issueRepository;
        $this->issueComponentRepository = $issueComponentRepository;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        try{
            $client = new Client();
            $response = $client->request('GET', env('API_URL')."/issues", []);
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

    public function insertInDatabase($json, $repository)
    {
        foreach ($json as $object){
            $issue = $repository->save((array)$object);
            foreach ($object->components as $component){
                $arrayIssueComponent = [
                    'issue_id'     => $issue->id,
                    'component_id' => $component
                ];

                $this->issueComponentRepository->save($arrayIssueComponent);
            }
        }
    }
}
