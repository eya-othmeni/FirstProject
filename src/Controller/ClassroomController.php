<?php

namespace App\Controller;

use App\Entity\Classroom;
use App\Form\ClassroomType;
use App\Repository\ClassroomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/addClassroom", name="addClassroom")
     */
    public function addClassroom(): Response
    {
        $cl=new Classroom();
        $cl->setName('test');
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($cl);
        $manager->flush();
        return $this->redirect('/listclassroom2');
       // return $this->render('classroom/index.html.twig',["list"=>$list]);
    }

    /**
     * @Route("/addClassroom2", name="addClassroom2")
     */
    public function addClassroom2(Request $request): Response
    {
        $cl=new Classroom();
        $myForm = $this->createForm(ClassroomType::class, $cl);
        $myForm=$myForm->handleRequest($request);
        if($myForm->isSubmitted()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($cl);
            $manager->flush();
            return $this->redirect('/listclassroom2');
        }
        return $this->render('classroom/form.html.twig',["myF"=>$myForm->createView()]);
    }

    /**
     * @Route("/updateClass/{id}", name="updateClassroom")
     */
    public function updateClassroom($id , Request $request, ClassroomRepository $repo): Response
    {

        $cl=$repo->find($id);

        $myForm = $this->createForm(ClassroomType::class, $cl);
        $myForm=$myForm->handleRequest($request);
        if($myForm->isSubmitted()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($cl);
            $manager->flush();
            return $this->redirect('/listclassroom2');
        }
        return $this->render('classroom/form.html.twig',["myF"=>$myForm->createView()]);
    }

}
