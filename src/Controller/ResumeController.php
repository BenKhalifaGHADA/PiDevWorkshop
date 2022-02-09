<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResumeController extends AbstractController
{
    /**
     * @Route("/resume", name="resume")
     */
    public function index(): Response
    {
        return $this->render('resume/index.html.twig');
        ;
    }

}