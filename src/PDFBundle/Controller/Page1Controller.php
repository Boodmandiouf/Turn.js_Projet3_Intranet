<?php

namespace PDFBundle\Controller;

use PDFBundle\Entity\Page1;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Page1 controller.
 *
 */
class Page1Controller extends Controller
{
    /**
     * Lists all page1 entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $page1s = $em->getRepository('PDFBundle:Page1')->findAll();

        return $this->render('PDFBundle:page1:index.html.twig', array(
            'page1s' => $page1s,
        ));
    }

    /**
     * Creates a new page1 entity.
     *
     */
    public function newAction(Request $request)
    {
        $page1 = new Page1();
        $form = $this->createForm('PDFBundle\Form\Page1Type', $page1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($page1);
            $em->flush($page1);

            return $this->redirectToRoute('page1_show', array('id' => $page1->getId()));
        }

        return $this->render('PDFBundle:page1:new.html.twig', array(
            'page1' => $page1,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a page1 entity.
     *
     */
    public function showAction(Page1 $page1)
    {
        $deleteForm = $this->createDeleteForm($page1);

        return $this->render('PDFBundle:page1:show.html.twig', array(
            'page1' => $page1,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing page1 entity.
     *
     */
    public function editAction(Request $request, Page1 $page1)
    {
        $deleteForm = $this->createDeleteForm($page1);
        $editForm = $this->createForm('PDFBundle\Form\Page1Type', $page1);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('page1_edit', array('id' => $page1->getId()));
        }

        return $this->render('PDFBundle:page1:edit.html.twig', array(
            'page1' => $page1,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a page1 entity.
     *
     */
    public function deleteAction(Request $request, Page1 $page1)
    {
        $form = $this->createDeleteForm($page1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($page1);
            $em->flush($page1);
        }

        return $this->redirectToRoute('page1_index');
    }

    /**
     * Creates a form to delete a page1 entity.
     *
     * @param Page1 $page1 The page1 entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Page1 $page1)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('page1_delete', array('id' => $page1->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
