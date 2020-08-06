<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use  Symfony\Component\HttpFoundation\Response;
use  Symfony\Component\HttpFoundation\Request;
use App\Entity\Car ;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class RentController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function show()
    {
        
    	$repo =$this->getDoctrine()->getRepository(Car::class);
    	$cars= $repo->findAll();
        return $this->render('rent/index.html.twig', [
            'controller_name' => 'RentController',
            'cars' => $cars]);

    }

    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request)
    {

    	// Here we create an object from the class that we made
       $car = new Car;
/* Here we will build a form using createFormBuilder and inside this function we will put our object and then we write add then we select the input type then an array to add an attribute that we want in our input field */
       $form = $this->createFormBuilder($car)->add('name', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('category', ChoiceType::class, array('choices'=>array('Limousine'=>'limousine', 'SUV'=>'SUV', 'City'=>'city'),'attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('price', MoneyType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('description', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       
   ->add('save', SubmitType::class, array('label'=> 'Create Car', 'attr' => array('class'=> 'btn-info', 'style'=>'margin-bottom:15px')))
       ->getForm();
       $form->handleRequest($request);
       

       /* Here we have an if statement, if we click submit and if  the form is valid we will take the values from the form and we will save them in the new variables */
       if($form->isSubmitted() && $form->isValid()){
           //fetching data

           // taking the data from the inputs by the name of the inputs then getData() function
           $name = $form['name']->getData();
           $category = $form['category']->getData();
           $description = $form['description']->getData();
           $price = $form['price']->getData();
                    
           // Here we will get the current date
           $now = new\DateTime('now');

/* these functions we bring from our entities, every column have a set function and we put the value that we get from the form */
           $car->setName($name);
           $car->setCategory($category);
           $car->setDescription($description);
           $car->setPrice($price);
           $car->setCreatedAt($now);
           $em = $this->getDoctrine()->getManager();
           $em->persist($car);
           $em->flush();
           $this->addFlash(
                   'notice',
                   'Car Added'
                   );
           return $this->redirectToRoute('home');
       }
/* now to make the form we will add this line form->createView() and now you can see the form in create.html.twig file  */
       return $this->render('rent/create.html.twig', array('form' => $form->createView()));

    }

     /**
     * @Route("/edit/{id}", name="edit")
     */
 
 public function edit($id, Request $request){
/* Here we have a variable todo and it will save the result of this search and it will be one result because we search based on a specific id */
   $car = $this->getDoctrine()->getRepository('App:Car')->find($id);
$now = new\DateTime('now');
/* Now we will use set functions and inside this set functions we will bring the value that is already exist using get function for example we have setName() and inside it we will bring the current value and use it again */
                       $car->setName($car->getName());
           $car->setCategory($car->getCategory());
           $car->setDescription($car->getDescription());
           $car->setPrice($car->getPrice());
           $car->setCreatedAt($now);
/* Now when you type createFormBuilder and you will put the variable todo the form will be filled of the data that you already set it */
       $form = $this->createFormBuilder($car)->add('name', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-botton:15px')))
        ->add('category', ChoiceType::class, array('choices'=>array('Limousine'=>'Limousine', 'SUV'=>'SUV', 'City'=>'city'),'attr' => array('class'=> 'form-control', 'style'=>'margin-botton:15px')))
       ->add('price', MoneyType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('description', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-botton:15px')))
      
     ->add('save', SubmitType::class, array('label'=> 'Update Cars', 'attr' => array('class'=> 'btn-primary', 'style'=>'margin-botton:15px')))
       ->getForm();
       $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid()){
           //fetching data
           $name = $form['name']->getData();
           $category = $form['category']->getData();
           $description = $form['description']->getData();
           $price = $form['price']->getData();
           $now = new\DateTime('now');
           $em = $this->getDoctrine()->getManager();
           $car = $em->getRepository('App:Car')->find($id);
           $car->setName($name);
           $car->setCategory($category);
           $car->setDescription($description);
           $car->setPrice($price);
           $car->setCreatedAt($now);
       
           $em->flush();
           $this->addFlash(
                   'notice',
                   'Car Updated'
                   );
           return $this->redirectToRoute('home');
       }
       return $this->render('rent/edit.html.twig', array('car' => $car, 'form' => $form->createView()));
   }



     /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete($id)
    {
    		$em = $this->getDoctrine()->getManager();
           $car = $em->getRepository('App:Car')->find($id);
           $em->remove($car);
            $em->flush();
           $this->addFlash(
                   'notice',
                   'Cars Removed'
                   );
            return $this->redirectToRoute('home');


    }

     /**
     * @Route("/details/{id}", name="details")
     */
    public function details($id)
    {

    	$repo =$this->getDoctrine()->getRepository(Car::class);
    	$car= $repo->find($id);
        return $this->render('rent/details.html.twig', [
                   'car' => $car
        ]);
        
    }
   /**
     * @Route("/categories/{category}", name="categories")
     */
    public function categories($category)
    {

    	$repo =$this->getDoctrine()->getRepository(Car::class);
    	$cars= $repo->findByCategory($category);
        return $this->render('rent/categories.html.twig', [
                   'cars' => $cars
        ]);
        
    }


}
