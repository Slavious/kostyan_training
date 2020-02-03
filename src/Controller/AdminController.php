<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Building;
use App\Entity\Buttons;
class AdminController extends AbstractController
{

    /**
     * @Route("/admin/building/add", name="buildinAdd")
     */
    public function buildingAdd()
    {
        return $this->render('admin/building_add.html.twig', []);
    }
    /**
     * @Route("/admin/building/save", name="buildingSave")
     */
    public function buildingSave(Request $request)
    {

            $name      =  $request->get('name');
            $url       =  $request->get('url');
            $logo      =  $request->get('logo');
            $background = $request->get('background');
            $brandName =  $request->get('brandName');

        if (!$name || !$url || !$brandName)
             {
                     return $this->json(false);


              }
        $building = new Building(); //- создание новой сущности
        $building->setName($name); //- назначаем имя
        $building->setUrl($url); //- назначаем урл
        $building->setLogo($logo); //- назначаем лого
        $building->setBackground($background); //- назначаем фон
        $building->setBrandName($brandName); //- назначаем имя бренда
        $this->getDoctrine()->getManager()->persist($building); //- записываем с возможностью отката
        $this->getDoctrine()->getManager()->flush(); //- записываем окончательно
        {
            return $this->json(true);
        }



    }
    /**
     * @Route("/admin/buttons/save", name="buttonsSave")
     */
    public function buttonsSave(Request $request)
    {

        $b_name          =  $request->get('b_name');
        $b_url           =  $request->get('b_url');
        $b_img           =  $request->get('b_img');
        $b_background    =  $request->get('b_background');
        $b_buildingName  =  $request->get('b_buildingName');



        $buttons = new buttons(); //- создание новой сущности
        $buttons-> setName($b_name); //- назначаем имя
        $buttons-> setUrl($b_url); //- назначаем урл
        $buttons-> setImg($b_img); //- назначаем лого
        $buttons-> setBackground($b_background); //- назначаем фон
        $buttons-> setBuilding($b_buildingName); //- назначаем имя бренда
        $this->getDoctrine()->getManager()->persist($buttons); //- записываем с возможностью отката
        $this->getDoctrine()->getManager()->flush(); //- записываем окончательно
        {
            return $this->json(true);
        }



    }

}
