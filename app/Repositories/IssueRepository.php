<?php


namespace App\Repositories;


use App\Models\Issue;

class IssueRepository extends AbstractRepository
{
    /**
     * Construtor da classe responsável por setar o tipo de objeto herdado pela classe pai
     * IssueRepository constructor.
     * @param Issue $issue
     */
    public function __construct(Issue $issue)
    {
        $this->model = $issue;
    }
}
