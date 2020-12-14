<?php

namespace App\Controller\FrontOffice;

use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PropertyRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/biens")
 */
class PropertyController extends AbstractController 
{
    private $repository;

    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route(name="property_index")
     */
    public function index(): Response
    {
        //TODO: faire une requete paginée pour choper  les biens


        return $this->render("front_office/biens/index.html.twig");
    }

    /**
     * @Route("/{slug}-{id}", name="property_show", requirements={"slug": "[a-z0-9\-]*"})
     */
    public function show(Property $property, string $slug): Response
    {
        if($property->getSlug() !== $slug) {
            return $this->redirectToRoute("property_show", [
                "id" => $property->getId(),
                "slug" => $property->getSlug()
            ], 301);
        }

        return $this->render("front_office/biens/show.html.twig");
    }


}