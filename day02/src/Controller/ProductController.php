<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use  Symfony\Component\HttpFoundation\Response ;
use App\Entity\Product ;

class ProductController extends AbstractController
{
/**
    * @Route("/create", name="createAction")
    */
   public function createAction()
   {  
       
        // you can fetch the EntityManager via $this->getDoctrine()
       // or you can add an argument to your action: createAction(EntityManagerInterface $em)
       $em = $this->getDoctrine()->getManager();
       $product = new  Product(); // here we will create an object from our class Product.
       $product->setName( 'Uyuni Salar'); // in our Product class we have a set function for each column in our db
       $product->setPrice(550);
  		$product->setImage('img/uyuni.jpg');
       // tells Doctrine you want to (eventually) save the Product (no queries yet)
       $em->persist($product);
        // actually executes the queries (i.e. the INSERT query)
       $em->flush();
       return  new Response('Saved new product with id '.$product->getId());
   }




    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
    	$repo =$this->getDoctrine()->getRepository(Product::class);
    	$products= $repo->findAll();
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'products' => $products
        ]);
    }

    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function showDetails($id)
    {
    	$repo =$this->getDoctrine()->getRepository(Product::class);
    	$product= $repo->find($id);
        return $this->render('product/details.html.twig', [
                   'product' => $product
        ]);
    }

}

