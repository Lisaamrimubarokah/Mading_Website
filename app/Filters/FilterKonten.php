<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterKonten implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if (session()->get('id_role') == "") {
            session()->setFlashdata('pesan', 'Silahkan Login terlebih dahulu');
            return redirect()->to(base_url('auth'));
        }
    }

    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        // Do something here
        if (session()->get('id_role') == 2) {
            return redirect()->to(base_url('front'));
        }
    }
}
