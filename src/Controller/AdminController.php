<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Building;
class AdminController extends AbstractController
{

    /**
     * @Route("/admin", name="admin")
     */
    public function index(Request $request){return $this->render('admin/building_add.html.twig', [
        'peremennaya_1' => 'Kostya',
        'peremennaya_2' => 'Uchitsa rabotat` s symfony',

    ]);}

    /**
     * @Route("/admin/building/add", name="buildinAdd")
     */
    public function buildingAdd()
    {
        return $this->render('admin/building_add.html.twig', []);
    }



}
