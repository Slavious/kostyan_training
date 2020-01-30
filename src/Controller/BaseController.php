<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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
        return $this->render('base/index.html.twig', [
            'peremennaya_1' => 'Kostya pizdyuk!',
            'peremennaya_2' => 'Uchitsa rabotat` s symfony',

        ]);



    }
}
