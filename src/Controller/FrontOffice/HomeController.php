<?php
namespace App\Controller\FrontOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        //TODO: faire la requette qui permet de choper les derniers biens dans la bdd

        
        return $this->render("front_office/home.html.twig");
    }
}