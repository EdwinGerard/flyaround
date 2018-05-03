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
     * @Route("/{review_id}/user/{user_id}", name="review_index", requirements={"review_id": "\d+"})
     * @ParamConverter("review", options={"mapping": {"review_id": "id"}})
     * @ParamConverter("user", options={"mapping": {"user_id": "id"}})
     */
    public function indexAction(Review $review, User $user)
    {
        return $this->render('review/index.html.twig', array('review' => $review, 'user' => $user));
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
