<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use AppBundle\Entity\User;
use AppBundle\Entity\Review;

/**
 * Class ReviewController
 * @package AppBundle\Controller
 * @Route("review")
 */
class ReviewController extends Controller
{
    /**
     * @Method("GET")
     * @Route("/")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reviews = $em->getRepository('AppBundle:Review')->findAll();
        return $this->render('review/index.html.twig', array('reviews' => $reviews));
    }

    /**
     * @Route("/new", name="review_new")
     * @Method({"GET", "POST"})
     */
    public function newAction()
    {
        return $this->render('review/add.html.twig');
    }
}
