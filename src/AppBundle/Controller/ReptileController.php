<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Animal;
use AppBundle\Entity\Reptile;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Animal controller.
 *
 */
class ReptileController extends Controller
{
    /**
     * Creates a new reptile entity.
     *
     */
    public function newAction(Request $request)
    {
        $animal = new Reptile();
        $form = $this->createForm('AppBundle\Form\ReptileType', $animal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($animal);
            $em->flush();

            return $this->redirectToRoute('animal_index');
        }

        return $this->render('reptile/new.html.twig', array(
            'animal' => $animal,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reptile entity.
     *
     */
    public function editAction(Request $request, Reptile $animal)
    {
        $editForm = $this->createForm('AppBundle\Form\ReptileType', $animal);
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
