<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Animal;
use AppBundle\Entity\Oiseau;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Animal controller.
 *
 */
class OiseauController extends Controller
{
    /**
     * Creates a new oiseau entity.
     *
     */
    public function newAction(Request $request)
    {
        $animal = new Oiseau();
        $form = $this->createForm('AppBundle\Form\OiseauType', $animal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($animal);
            $em->flush();

            return $this->redirectToRoute('animal_index');
        }

        return $this->render('oiseau/new.html.twig', array(
            'animal' => $animal,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing oiseau entity.
     *
     */
    public function editAction(Request $request, Oiseau $animal)
    {
        $editForm = $this->createForm('AppBundle\Form\OiseauType', $animal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('animal_index');
        }

        return $this->render('animal/edit.html.twig', array(
            'animal' => $animal,
            'edit_form' => $editForm->createView()
        ));
    }
}
