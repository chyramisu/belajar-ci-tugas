<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Role implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
    if (!session()->has('isLoggedIn')) {
        return redirect()->to(site_url('login'));
    }   

    if (session()->get('role') != 'admin') {
        return redirect()->to(site_url('/'));
    }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}