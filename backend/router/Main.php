<?php

class Main extends Page
{
    /** @url / */
    public function index()
    {
        $this->addCustomMessages('main');
        $this->showPage();
    }

    public function waiting()
    {
        $this->showPage();
    }
}