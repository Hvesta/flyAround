<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;




/**
* Listing controller.
*
* @Route("review")
*/


class ReviewController extends Controller

{

    /**
     * List all reviews
     *
     * @Route("/", name="review_index")
     * @Method("GET")

     */

    public function indexAction()

    {

        $em = $this->getDoctrine()->getManager();
        $reviews = $em->getRepository('AppBundle:Review')->findAll();

        return $this->render('review/index.html.twig', array(
            'reviews' => $reviews,

        ));
    }



    /**
     * Creates a new review.
     *
     * @Route("/new", name="review_new")
     * @Method({"GET", "POST"})
     */

    public function newAction(Request $request)
    {
        return $this->render('review/new.html.twig');


    }



}