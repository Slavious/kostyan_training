<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Building;

class BaseController extends AbstractController
{
    /**
     * @Route("/base", name="base")
     */
    public function index(Request $request)
    {
        if ($request->get('run')) {
            system('c:\WINDOWS\system32\cmd.exe /c START C:\Windows\System32\drivers\etc\startvr.bat');
            return json_encode(["success" == true]);
        }

        return $this->render('base/index.html.twig', []);
    }

    /**
     * @Route("/planing", name="planing")
     */
    public function planing()
    {
        return $this->render('base/plan.html.twig', []);
    }

    /**
     * @Route("/camera", name="camera")
     */
    public function camera()
    {
        return $this->render('base/camera1_full.html.twig', []);
    }

    /**
     * @Route("/location", name="location")
     */
    public function location()
    {
        return $this->render('base/index_map_s.html.twig', []);
    }

    /**
     * @Route("/aerophoto", name="aerophoto")
     */
    public function aerophoto()
    {
        return $this->render('base/aerophoto.html.twig', []);
    }

    /**
     * @Route("/tour", name="tour")
     */
    public function tour()
    {
        return $this->render('base/3d.html.twig', []);
    }

    /**
     * @Route("/gallery", name="gallery")
     */
    public function gallery()
    {
        return $this->render('base/gallery1.html.twig', []);
    }
}
