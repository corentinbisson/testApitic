<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Animal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Animal controller.
 *
 */
class AnimalController extends Controller
{
    /**
     * Lists all animal entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $animals = $em->getRepository('AppBundle:Animal')->findAll();

        $tabForms = array();
        foreach ($animals as $a) {
            $tabForms[$a->getId()] = $this->createDeleteForm($a)->createView();
        }

        return $this->render('animal/index.html.twig', array(
            'animals' => $animals,
            'tabForms' => $tabForms
        ));
    }

    /**
     * Creates a new animal entity.
     *
     */
    public function newAction(Request $request)
    {
        $types = ['mamifere' => 'Mamifère', 'reptile' => 'Reptile', 'oiseau' => 'Oiseau'];
        return $this->render('animal/new.html.twig', array('types' => $types));
    }

    /**
     * Displays a form to edit an existing animal entity.
     *
     */
    public function editAction(Request $request, Animal $animal)
    {
        switch (get_class($animal)) {
            case 'AppBundle\Entity\Mamifere':
                return $this->redirectToRoute('mamifere_edit', array('id' => $animal->getId()));
                break;
            case 'AppBundle\Entity\Oiseau':
                return $this->redirectToRoute('oiseau_edit', array('id' => $animal->getId()));
                break;
            case 'AppBundle\Entity\Reptile':
                return $this->redirectToRoute('reptile_edit', array('id' => $animal->getId()));
                break;
        }
        return $this->redirectToRoute('animal_index');
    }

    /**
     * Deletes a animal entity.
     *
     */
    public function deleteAction(Request $request, Animal $animal)
    {
        $form = $this->createDeleteForm($animal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($animal);
            $em->flush();
        }

        return $this->redirectToRoute('animal_index');
    }

    /**
     * Creates a form to delete a animal entity.
     *
     * @param Animal $animal The animal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Animal $animal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('animal_delete', array('id' => $animal->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
