<?php

namespace App\Controller;

use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Building;
use App\Entity\Buttons;
class AdminController extends AbstractController
{
    /**
     * @Route("/admin/building", name="buildings")
     */
    public function buildingsList()
    {
        $buildigs = $this->getDoctrine()->getRepository(Building::class)->findAll();
        return $this->render('admin/building_list.html.twig', ['buildings' => $buildigs]);
    }

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

        if (!$name || !$url || !$brandName) {
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

        return $this->json(true);
    }

    /**
     * @Route("/admin/buttons/save", name="buttons_save")
     */
    public function buttonsSave(Request $request)
    {
        $buttons = new buttons(); //- создание новой сущности
        $buttons-> setName($b_name); //- назначаем имя
        $buttons-> setUrl($b_url); //- назначаем урл
        $buttons-> setImg($b_img); //- назначаем лого
        $buttons-> setBackground($b_background); //- назначаем фон
        $buttons-> setBuilding($b_buildingName); //- назначаем имя бренда
        $this->getDoctrine()->getManager()->persist($buttons); //- записываем с возможностью отката
        $this->getDoctrine()->getManager()->flush(); //- записываем окончательно

        return $this->json(true);
    }

    /**
     * @Route("/admin/building/delete/{id}", name="building_delete")
     */
    public function deleteBuilding($id)
    {
        $building = $this->getDoctrine()->getRepository(Building::class)->find($id);
        if (!$building) {
            throw new NotFoundHttpException('Building with that id is not found');
        }
        $this->getDoctrine()->getManager()->remove($building);
        $this->getDoctrine()->getManager()->flush();
        return $this->json(true);
    }


    public function addButtons(int $id)
    {
        $building = $this->getDoctrine()->getRepository(Building::class)->find($id);
        if (!$building) {
            throw new NotFoundHttpException('Building with that id is not found');
        }
        $buttons = $this->getDoctrine()->getRepository(Buttons::class)->findBy(['building' => $building]);

        return $this->render('admin/building_add.html.twig', ['buttons' => $buttons, 'building' => $building]);
    }

}
