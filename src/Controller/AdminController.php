<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Building;
class AdminController extends AbstractController
{

    /**
     * @Route("/admin/building/add", name="buildinAdd")
     */
    public function buildingAdd()
    {
        return $this->render('admin/building_add.html.twig', []);
    }



}
