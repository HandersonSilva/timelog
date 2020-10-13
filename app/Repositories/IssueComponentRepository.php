<?php


namespace App\Repositories;


use App\Models\IssueComponent;

class IssueComponentRepository extends AbstractRepository
{
    /**
     * Construtor da classe responsável por setar o tipo de objeto herdado pela classe pai
     * IssueComponentRepository constructor.
     * @param IssueComponent $issueComponent
     */
    public function __construct(IssueComponent $issueComponent)
    {
        $this->model = $issueComponent;
    }
}
