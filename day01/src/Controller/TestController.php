<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function index()
    {
    	$name="Bruno";
    	$job ="IT";
        return $this->render('test/index.html.twig', array("name"=>$name,"job"=>$job));
    }

      /**
     * @Route("/testingURL", name="testing")
     */
    public function test()
    {
    	
        return $this->render('test/test.html.twig');
    }

 /**
     * @Route("/name/{name}", name="printingname")
     */
    public function printname($name)
    {
    	
        return $this->render('test/print.html.twig',array("name"=>$name, "title" => "Bienvenue here", "age" => 17));
    }

   
}



	// [
 //            'controller_name' => 'TestController',
 //        ]