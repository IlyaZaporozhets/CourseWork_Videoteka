<?php


class Manager extends Page
{
    public function __construct()
    {
        if((int)Helper::getSessionParam('user') !== 1) {
            header('Location: /');
            exit(301);
       }
        //$this->addThirdLevelFor('items');
    }

    public function index()
    {
        $this->showPage();
    }

    public function items()
    {
        $r = Helper::getRequestParams([OPTIONAL => ['add', 'edit']]);

        $pageType = $r->param('edit') > 0 ? 'edit' : 'add';

        $this->showPage([
            'type' => $pageType,
            'data' => $r->toArray()
        ]);
    }

    public function users()
    {
        $r = Helper::getRequestParams([OPTIONAL => ['edit']]);

        $this->showPage([
            'type' => 'edit',
            'data' => $r->toArray()
        ]);
    }

    public function orders()
    {
        $r = Helper::getRequestParams([OPTIONAL => ['edit']]);

        $this->showPage([
            'type' => 'edit',
            'data' => $r->toArray()
        ]);
    }

    public function search()
    {
        $r = Helper::getRequestParams([OPTIONAL => ['item', 'user', 'order']]);

        $pageType = 'itemsByName';
        if ($r->param('user') !== '') $pageType = 'userByPhone';
        if ($r->param('order') !== '') $pageType = 'orderByUserID';

        $this->showPage([
            'type' => $pageType,
            'data' => $r->toArray()
        ]);
    }
}