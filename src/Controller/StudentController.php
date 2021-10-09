<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    /**
     * @Route("/student", name="student")
     */
    public function index(): Response
    {
        //return new Response("Bonjour mes étudiants");
       return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }

    /**
     * @Route("/show/{name}", name="showstudent")
     */
    public function showstudent($name): Response
    {

        return $this->render('student/student.html.twig', [
            'controller_name' => 'StudentController'],["pathparam"=>$name]
        );
    }

    /**
     * @Route("/list", name="list")
     */
    public function getFormations():Response
    {
        $formations=array(
            array('ref' => 'form147','titre'=>'Formation Symfony4', 'Description'=>'formation pratique','date_debut'=>'12/06/2020','date_fin'=>'19/06/2020','nb_participant'=>19),
            array('ref' => 'form177','titre'=>'Formation SOA', 'Description'=>'formation theorique','date_debut'=>'03/12/2020','date_fin'=>'10/12/2020','nb_participant'=>0),
            array('ref' => 'form178','titre'=>'Formation Angular', 'Description'=>'formation theorique','date_debut'=>'10/06/2020','date_fin'=>'14/06/2020','nb_participant'=>'12'),

        );
        return $this->render('club/list.html.twig',["mesFormations"=>$formations]);
    }
}
