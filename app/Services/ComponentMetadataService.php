<?php


namespace App\Services;


use App\Interfaces\ServicesInterface;
use App\Repositories\ComponentRepository;
use App\Repositories\TimeLogRepository;

class ComponentMetadataService implements ServicesInterface
{
    private $componentRepository;
    private $timeLogRepository;

    /**
     * Construtor da classe, responsável por fazer as injeções de dependencia
     * ComponentMetadataService constructor.
     * @param ComponentRepository $componentRepository
     * @param TimeLogRepository $timeLogRepository
     */
    public function __construct(
        ComponentRepository $componentRepository,
        TimeLogRepository $timeLogRepository
    )
    {
        $this->componentRepository = $componentRepository;
        $this->timeLogRepository = $timeLogRepository;
    }

    /**
     * Método que executa a responsabilidade oferecida pelo service
     * @return mixed
     */
    public function execute()
    {
        $components = $this->componentRepository->getAll();

        $objs = $components->map(function ($component){
            $issueComponent = $component->issueComponent;

            $obj = [];
            $obj['component_id'] = $component->id;
            $obj['number_of_issues'] = $issueComponent->count();
            $obj['seconds_logged'] = $issueComponent->reduce(function ($carry, $item) {
                return $carry + intval($this->timeLogRepository->getTotalSecondsLoggedByIssueId($item->issue_id)[0]->seconds_logged);
            });

            return $obj;
        });

        return $objs->toArray();
    }
}
