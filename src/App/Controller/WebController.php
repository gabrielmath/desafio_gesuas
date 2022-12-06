<?php

namespace Source\App\Controller;

use Source\Core\Controller;
use Source\Support\Repositories\Eloquent\UserRepository;
use Source\Support\Repositories\UserRepositoryInterface;

class WebController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(string $pathToViews = null)
    {
        parent::__construct($pathToViews);
        $this->userRepository = new UserRepository();
    }

    /**
     * @return void
     */
    public function index(): void
    {
        $users =$this->userRepository->all();
        echo $this->view->render('home', compact('users'));
    }

    /**
     * @return void
     */
    public function store()
    {
        $name = filter_var(request()->get('name'), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $document = $this->createNIS();

        $this->userRepository->create([
            'name' => $name,
            'document' => $document
        ]);

        $this->message->success('Cidadão cadastrado com sucesso!')->flash();

        redirect('/');
    }

    /**
     * @return int
     */
    private function createNIS(): int
    {
        $digits = 11;
        $nis = rand(pow(10, $digits-1), pow(10, $digits)-1);

        if($this->userRepository->whereDocument($nis)->count() > 0) {
            return $this->createNIS();
        }

        return $nis;
    }
}
