<?php

namespace App\Controllers;

class Home extends PublicController
{
    public function index()
    {
        echo $this->view('public/index', array(), $this->head);
    }
	public function gifts()
    {
        echo $this->view('public/index', array(), $this->head);
    }
	public function about()
    {
        echo $this->view('public/index', array(), $this->head);
    }
	public function messages()
    {
        echo $this->view('public/index', array(), $this->head);
    }
	public function contacts()
    {
        echo $this->view('public/index', array(), $this->head);
    }
}
