<?php

class Dashboard extends Page
{
    /** @var User $user */
    private $user;

    /**
     * Dashboard constructor.
     * @param ActionCore $core
     * @throws Exception
     */
    public function __construct(ActionCore $core)
    {
        if ((Helper::getSessionParam('status') === 'UNCONFIRMED' ||
            Helper::getSessionParam('status') === 'CONFIRMATION')
            && $_REQUEST['url'] !== 'dashboard/confirmation') {
            header('Location: /dashboard/confirmation');
        }
        $this->setCore($core);
        $this->setMetaTemplate('dashboard');
        $this->addCustomMessages('dashboardBars');
        $this->user = User::getCurrentUser($core);

    }

    public function index()
    {
        $this->showPage();
    }

    public function confirmation()
    {
        $this->showPage();
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}