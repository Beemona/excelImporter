<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AngularController extends AbstractController
{
    public function serveApp(): Response
    {
        return $this->render('angular/excel-import.component.html');
    }
}
