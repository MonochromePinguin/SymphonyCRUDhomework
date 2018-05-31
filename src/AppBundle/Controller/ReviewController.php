<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Review;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ReviewController
 * @package AppBundle\Controller
 *
 * @Route("review")
 */
class ReviewController extends Controller
{
    /**
     * @Route("/", name="review_index")
     * @Method({"GET"})
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $reviews = $em->getRepository('Review')->findAll();

        return $this->render('AppBundle:Review:index.html.twig', ['reviews' => $reviews]);
    }

    /**
     * @Route("/new", name="review_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $review = new Review();
        $form = $this->createForm('AppBundle\Form\ReviewType', $review);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($review);
            $em->flush();

            return $this->redirectToRoute('flight_show', array('id' => $review->getId()));
        }

        return $this->render('review/new.html.twig', ['review' => $review, 'form' => $form->createView()]);
    }

}
