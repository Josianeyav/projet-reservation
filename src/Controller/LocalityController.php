<?php

namespace App\Controller;

use App\Entity\Locality;
use App\Form\LocalityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/locality")
 */
class LocalityController extends Controller
{
    /**
     * @Route("/", name="locality_index", methods="GET")
     */
    public function index(): Response
    {
        $localities = $this->getDoctrine()
            ->getRepository(Locality::class)
            ->findAll();

        return $this->render('locality/index.html.twig', ['localities' => $localities]);
    }

    /**
     * @Route("/new", name="locality_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $locality = new Locality();
        $form = $this->createForm(LocalityType::class, $locality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($locality);
            $em->flush();

            return $this->redirectToRoute('locality_index');
        }

        return $this->render('locality/new.html.twig', [
            'locality' => $locality,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="locality_show", methods="GET")
     */
    public function show(Locality $locality): Response
    {
        return $this->render('locality/show.html.twig', ['locality' => $locality]);
    }

    /**
     * @Route("/{id}/edit", name="locality_edit", methods="GET|POST")
     */
    public function edit(Request $request, Locality $locality): Response
    {
        $form = $this->createForm(LocalityType::class, $locality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('locality_edit', ['id' => $locality->getId()]);
        }

        return $this->render('locality/edit.html.twig', [
            'locality' => $locality,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="locality_delete", methods="DELETE")
     */
    public function delete(Request $request, Locality $locality): Response
    {
        if ($this->isCsrfTokenValid('delete'.$locality->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($locality);
            $em->flush();
        }

        return $this->redirectToRoute('locality_index');
    }
}
