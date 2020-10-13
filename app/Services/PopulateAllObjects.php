<?php


namespace App\Services;

class populateAllObjects
{
    private $populateComponentsService;
    private $populateIssueService;
    private $populateUsersService;
    private $populateTimeLogsService;

    /**
     * Construtor da classe, responsável por fazer as injeções de dependencia
     * populateAllObjects constructor.
     * @param PopulateComponentsService $populateComponentsService
     * @param PopulateIssuesService $populateIssueService
     * @param PopulateUsersService $populateUsersService
     * @param PopulateTimeLogsService $populateTimeLogsService
     */
    public function __construct(
        PopulateComponentsService $populateComponentsService,
        PopulateIssuesService $populateIssueService,
        PopulateUsersService $populateUsersService,
        PopulateTimeLogsService $populateTimeLogsService
    )
    {
        $this->populateComponentsService = $populateComponentsService;
        $this->populateIssueService = $populateIssueService;
        $this->populateUsersService = $populateUsersService;
        $this->populateTimeLogsService = $populateTimeLogsService;
    }

    /**
     * Método que executa a responsabilidade da classe
     * @return bool
     */
    public function execute(){
        try {
            $this->populateComponentsService->execute();
            $this->populateIssueService->execute();
            $this->populateUsersService->execute();
            $this->populateTimeLogsService->execute();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }
}
