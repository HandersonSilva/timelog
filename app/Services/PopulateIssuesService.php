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

    /**
     * Construtor da classe, responsável por fazer as injeções de dependencia
     * PopulateIssuesService constructor.
     * @param IssueRepository $issueRepository
     * @param IssueComponentRepository $issueComponentRepository
     */
    public function __construct(IssueRepository $issueRepository,
                                IssueComponentRepository $issueComponentRepository)
    {
        $this->repositoryInterface = $issueRepository;
        $this->issueComponentRepository = $issueComponentRepository;
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
            $response = $client->request('GET', env('API_URL')."/issues", []);
            if($response->getStatusCode() == 200){
                $jsonResponse = json_decode($response->getBody());
                $this->insertInDatabase($jsonResponse, $this->repositoryInterface);
                return $jsonResponse;
            }else{
                throw new \Exception('Erro no service de issues', 500);
            }

        }catch (\Exception $e){
            return $e;
        }
    }

    /**
     * Override do método insertInDatabase da classe pai
     * @param $json
     * @param $repository
     * @return mixed|void
     */
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
