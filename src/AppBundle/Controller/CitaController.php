<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cita;
use AppBundle\Entity\Mascota;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Citum controller.
 *
 * @Route("cita")
 */
class CitaController extends Controller
{
    /**
     * Lists all citum entities.
     *
     * @Route("/", name="cita_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $citas = $em->getRepository('AppBundle:Cita')->findAll();

        return $this->render('cita/index.html.twig', array(
            'citas' => $citas,
        ));
    }

    /**
     * Creates a new citum entity.
     *
     * @Route("/new/{id}", name="cita_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Mascota $mascota, Request $request)
    {
        $citum = new Cita();
        $form = $this->createForm('AppBundle\Form\CitaType', $citum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($citum->getProximaCita() < $citum->getFechaAtencion()) {
                $this->addFlash('danger', 'La proxima cita no puede ser antes de la fecha de atencion.');
            }
            else {
               $citum->setMascota($mascota);
                $em = $this->getDoctrine()->getManager();
                $em->persist($citum);
                $em->flush();

                return $this->redirectToRoute('mascota_show', array('id' => $mascota->getId())); 
            }
        }

        return $this->render('cita/new.html.twig', array(
            'citum' => $citum,
            'mascota' => $mascota,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a citum entity.
     *
     * @Route("/{id}", name="cita_show")
     * @Method("GET")
     */
    public function showAction(Cita $citum)
    {
        $deleteForm = $this->createDeleteForm($citum);

        return $this->render('cita/show.html.twig', array(
            'citum' => $citum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing citum entity.
     *
     * @Route("/{id}/edit", name="cita_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cita $citum)
    {
        $deleteForm = $this->createDeleteForm($citum);
        $editForm = $this->createForm('AppBundle\Form\CitaType', $citum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cita_edit', array('id' => $citum->getId()));
        }

        return $this->render('cita/edit.html.twig', array(
            'citum' => $citum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a citum entity.
     *
     * @Route("/{id}", name="cita_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cita $citum)
    {
        $form = $this->createDeleteForm($citum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($citum);
            $em->flush();
        }

        return $this->redirectToRoute('cita_index');
    }

    /**
     * Creates a form to delete a citum entity.
     *
     * @param Cita $citum The citum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cita $citum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cita_delete', array('id' => $citum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
