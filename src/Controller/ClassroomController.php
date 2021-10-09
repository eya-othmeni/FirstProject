<?php

namespace App\Controller;

use App\Entity\Classroom;
use App\Repository\ClassroomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassroomController extends AbstractController
{
    /**
     * @Route("/listclassroom", name="listclassroom")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Classroom::class);
        $list=$repo->findAll();
        return $this->render('classroom/index.html.twig',["list"=>$list]);
    }
    /**
     * @Route("/listclassroom2", name="listclassroom2")
     */
    public function list(ClassroomRepository $repo): Response
    {
        $list=$repo->findAll();
        return $this->render('classroom/index.html.twig',["list"=>$list]);
    }

}
