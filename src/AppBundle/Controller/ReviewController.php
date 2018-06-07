<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Review;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ReviewController
 * @package AppBundle\Controller
 * @Route("/review")
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
        $reviews = $em->getRepository('AppBundle:Review')->findAll();

        return $this->render('review/index.html.twig', ['reviews' => $reviews]);
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

            return $this->redirectToRoute('review_index');
        }

        return $this->render('review/new.html.twig', ['review' => $review, 'form' => $form->createView()]);
    }

    /**
     * @Route("/{id}/show", name="review_show")
     * @Method({"GET"})
     */
    public function showAction(Review $review)
    {
        $deleteFormView = $this->createDeleteForm($review)->createView();

        return $this->render('review/show.html.twig', array(
            'review' => $review,
            'delete_form' => $deleteFormView,
        ));
    }

    /**
     * @Route("/{id}/edit", name="review_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Review $review)
    {
        $deleteForm = $this->createDeleteForm($review);
        $editForm = $this->createForm('AppBundle\Form\ReviewType', $review);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('review_edit', array('id' => $review->getId()));
        }

        return $this->render(
            'review/edit.html.twig',
            [
                'review' => $review,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView()
            ]
        );
    }

    /**
     * @Route("/{id}/delete", name="review_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Review $review)
    {
        $form = $this->createDeleteForm($review);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($review);
            $em->flush();
        }

        return $this->redirectToRoute('review_index');
    }

    /**
     * @param Review $review
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Review $review)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('review_delete', ['id' => $review->getId()]))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}
