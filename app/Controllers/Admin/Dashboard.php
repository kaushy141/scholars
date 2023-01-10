<?php

namespace App\Controllers\Admin;
use App\Controllers\AdminController;

class Dashboard extends AdminController
{
    public function index()
    {
        echo $this->adminView('dashboard/index', array(), $this->head);
    }
}
