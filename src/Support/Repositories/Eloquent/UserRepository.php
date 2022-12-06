<?php

namespace Source\Support\Repositories\Eloquent;

use Source\Support\Models\User;
use Source\Support\Repositories\BaseRepository;
use Source\Support\Repositories\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(new User());
    }

    public function whereDocument(string $document)
    {
        return $this->model->whereDocument($document);
    }
}
