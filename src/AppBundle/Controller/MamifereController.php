<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Animal;
use AppBundle\Entity\Mamifere;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Animal controller.
 *
 */
class MamifereController extends Controller
{
    /**
     * Creates a new mamifere entity.
     *
     */
    public function newAction(Request $request)
    {
        $animal = new Mamifere();
        $form = $this->createForm('AppBundle\Form\MamifereType', $animal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($animal);
            $em->flush();

            return $this->redirectToRoute('animal_index');
        }

        return $this->render('mamifere/new.html.twig', array(
            'animal' => $animal,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing mamifere entity.
     *
     */
    public function editAction(Request $request, Mamifere $animal)
    {
        $editForm = $this->createForm('AppBundle\Form\MamifereType', $animal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('animal_index');
        }

        return $this->render('animal/edit.html.twig', array(
            'animal' => $animal,
            'edit_form' => $editForm->createView(),
        ));
    }
}
