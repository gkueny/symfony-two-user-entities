<?php

namespace App\Controller;

use App\Entity\Student;
use App\Entity\Teacher;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class FillDBController extends AbstractController
{
    protected $em;
    protected $encoder;

    public function __construct(EntityManagerInterface $em, EncoderFactoryInterface $encoder)
    {
        $this->em = $em;
        $this->encoder = $encoder;
    }

    /**
     * @Route("/filldb", name="fill_db")
     */
    public function index()
    {
        $teachers = $this->em->getRepository("App:Teacher")->findAll();

        if(count($teachers) === 0) {
            $student = new Student();
            $teacher = new Teacher();

            $student->setEmail("student@test.fr");
            $student->setPassword( $this->encoder->getEncoder($student)->encodePassword("password", ""));
            $student->setStudentField("test");
            $teacher->setEmail("teacher@test.fr");
            $teacher->setPassword( $this->encoder->getEncoder($teacher)->encodePassword("password", ""));
            $teacher->setTeacherField("test");

            $this->em->persist($student);
            $this->em->persist($teacher);
            $this->em->flush();
        }


        return $this->render('fill_db/index.html.twig', [
            'controller_name' => 'FillDBController',
            'alreadyHaveData' => count($teachers) > 0
        ]);
    }
}
