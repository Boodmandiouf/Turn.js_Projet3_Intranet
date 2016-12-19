<?php

namespace PDFBundle\Controller;

use PDFBundle\Entity\Page2;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Page2 controller.
 *
 */
class Page2Controller extends Controller
{
    /**
     * Lists all page2 entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $page2s = $em->getRepository('PDFBundle:Page2')->findAll();

        return $this->render('@PDF/page2/index.html.twig', array(
            'page2s' => $page2s,
        ));
    }

    /**
     * Creates a new page2 entity.
     *
     */
    public function newAction(Request $request)
    {
        $page2 = new Page2();
        $form = $this->createForm('PDFBundle\Form\Page2Type', $page2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($page2);
            $em->flush($page2);

            return $this->redirectToRoute('page2_show', array('id' => $page2->getId()));
        }

        return $this->render('@PDF/page2/new.html.twig', array(
            'page2' => $page2,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a page2 entity.
     *
     */
    public function showAction(Page2 $page2)
    {
        $deleteForm = $this->createDeleteForm($page2);

        return $this->render('@PDF/page2/show.html.twig', array(
            'page2' => $page2,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing page2 entity.
     *
     */
    public function editAction(Request $request, Page2 $page2)
    {
        $deleteForm = $this->createDeleteForm($page2);
        $editForm = $this->createForm('PDFBundle\Form\Page2Type', $page2);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('page2_edit', array('id' => $page2->getId()));
        }

        return $this->render('@PDF/page2/edit.html.twig', array(
            'page2' => $page2,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a page2 entity.
     *
     */
    public function deleteAction(Request $request, Page2 $page2)
    {
        $form = $this->createDeleteForm($page2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($page2);
            $em->flush($page2);
        }

        return $this->redirectToRoute('page2_index');
    }

    /**
     * Creates a form to delete a page2 entity.
     *
     * @param Page2 $page2 The page2 entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Page2 $page2)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('page2_delete', array('id' => $page2->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
