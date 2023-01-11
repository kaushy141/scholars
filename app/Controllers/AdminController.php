<?php

namespace App\Controllers;
use App\Libraries\Html;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class AdminController extends CommonController
{
	public $request;
	public $response;
	public $logger;
	
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

    }

	
    public function authView($page, $data = array())
    {
       return view('admin/_templates/header', $this->head).view($page, $data).view('admin/_templates/footer');
    }

	public function adminView($page, $data = array())
    {
		   return view('admin/_templates/header', $this->head)
		   .view('admin/_templates/admin-layout-wrapper-open', $data)
		   .view('admin/_templates/admin-aside', $data)
		   .view('admin/_templates/admin-navbar', $data)
		   .view('admin/_templates/admin-content-wrapper-open', $data)
		   .view('admin/'.$page, $data)
		   .view('admin/_templates/admin-content-wrapper-close', $data)
		   .view('admin/_templates/admin-layout-wrapper-close', $data)
		   .view('admin/_templates/footer');
    }
}
