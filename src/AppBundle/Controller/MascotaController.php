<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Mascota;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Ps\PdfBundle\Annotation\Pdf;

/**
 * Mascotum controller.
 *
 * @Route("mascota")
 */
class MascotaController extends Controller
{
    /**
     * @Pdf()
     * @Route("/verpdf/{id}")
     */
    public function showpdfAction(Mascota $mascota)
    {
        $em = $this->getDoctrine()->getManager();
        $citas = $em->createQuery('SELECT c from AppBundle:Cita c where c.mascota = ?1')
                    ->setParameter(1, $mascota)
                    ->getResult();
        //$format = $this->get('request')->get('_format');
        $facade = $this->get('ps_pdf.facade');
        $response = new Response();
        $this->render('AppBundle:Mascota:show.pdf.twig', array( 'mascota' => $mascota, 'citas'=>$citas), $response);

        $xml = $response->getContent();

        $content = $facade->render($xml);

        return new Response($content, 200, array('content-type' => 'application/pdf'));

        
    }

    /**
     * Lists all mascotum entities.
     *
     * @Route("/", name="mascota_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $mascotas = $em->getRepository('AppBundle:Mascota')->findAll();

        return $this->render('mascota/index.html.twig', array(
            'mascotas' => $mascotas,
        ));
    }

    /**
     * Creates a new mascotum entity.
     *
     * @Route("/new", name="mascota_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mascotum = new Mascota();
        $form = $this->createForm('AppBundle\Form\MascotaType', $mascotum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mascotum->setUsuario($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($mascotum);
            $em->flush();

            return $this->redirectToRoute('mascota_show', array('id' => $mascotum->getId()));
        }

        return $this->render('mascota/new.html.twig', array(
            'mascotum' => $mascotum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a mascotum entity.
     *
     * @Route("/{id}", name="mascota_show")
     * @Method("GET")
     */
    public function showAction(Mascota $mascotum)
    {
        $deleteForm = $this->createDeleteForm($mascotum);

        $em = $this->getDoctrine()->getManager();
        $citas = $em->createQuery('SELECT c from AppBundle:Cita c where c.mascota = ?1')
                    ->setParameter(1, $mascotum)
                    ->getResult();

        return $this->render('mascota/show.html.twig', array(
            'citas' =>$citas,
            'mascotum' => $mascotum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing mascotum entity.
     *
     * @Route("/{id}/edit", name="mascota_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Mascota $mascotum)
    {
        $deleteForm = $this->createDeleteForm($mascotum);
        $editForm = $this->createForm('AppBundle\Form\MascotaType', $mascotum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mascota_edit', array('id' => $mascotum->getId()));
        }

        return $this->render('mascota/edit.html.twig', array(
            'mascotum' => $mascotum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a mascotum entity.
     *
     * @Route("/{id}", name="mascota_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Mascota $mascotum)
    {
        $form = $this->createDeleteForm($mascotum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mascotum);
            $em->flush();
        }

        return $this->redirectToRoute('mascota_index');
    }

    /**
     * Creates a form to delete a mascotum entity.
     *
     * @param Mascota $mascotum The mascotum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Mascota $mascotum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mascota_delete', array('id' => $mascotum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    

}
