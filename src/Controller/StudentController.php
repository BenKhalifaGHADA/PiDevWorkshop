<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    /**
     * @Route("/student", name="student")
     */
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }

    /**
     * @Route("/addStudent", name="AddStudent")
     */
    public function AddStudent(Request $request){
      $student=new Student();
      $form=$this->createForm(StudentType::class,$student);
      $form->handleRequest($request);
      if($form->isSubmitted()&& $form->isValid()){
          $student=$form->getData();
          $em=$this->getDoctrine()->getManager();
          $em->persist($student);
          $em->flush();
          return new Response("Student added");
      }
      return $this->render('student/addStudent.html.twig',['formA'=>$form->createView()]);
    }
}
