<?php


namespace App\Repositories;


use App\Models\Issue;

class IssueRepository extends AbstractRepository
{
    public function __construct(Issue $issue)
    {
        $this->model = $issue;
    }
}
