<?php

namespace App\Controllers;
use App\Libraries\Html;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class PublicController extends CommonController
{
	public $request;
	public $response;
	public $logger;
	public $email;

	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

    }
	
	public function view($page, $data = array())
    {
		return view('public/_templates/head', $this->head)
			.view('public/_templates/header', $this->head)
		   .view($page, $data)
		   .view('public/_templates/footer');
	}

}
