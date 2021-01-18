<?php

namespace App\Controllers;

use PhpParser\Error;
use PhpParser\NodeDumper;
use PhpParser\ParserFactory;

class Home extends BaseController
{
    public function index()
    {
        return redirect()->to(base_url('site'));
    }
}
