<?php


namespace App\Repositories;


use App\Models\IssueComponent;

class IssueComponentRepository extends AbstractRepository
{
    public function __construct(IssueComponent $issueComponent)
    {
        $this->model = $issueComponent;
    }
}
