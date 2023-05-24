<?php

namespace App\Controller\Admin;

use App\Entity\RendezVous;
use App\Form\RendezVousType;
use App\Repository\RendezVousRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class RendezVousController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_rendez_vous_index", methods={"GET"})
     */
    public function index(RendezVousRepository $rendezVousRepository): Response
    {
        return $this->render('admin/index.html.twig', [
            'rendez_vouses' => $rendezVousRepository->findAll(),
        ]);
    }

    /**
     * @Route("/rendez-vous/new", name="app_admin_rendez_vous_new", methods={"GET", "POST"})
     */
    public function new(Request $request, RendezVousRepository $rendezVousRepository): Response
    {
    
        $rendezVous = new RendezVous();
        $form = $this->createForm(RendezVousType::class, $rendezVous);
        $form->handleRequest($request);
 
        if ($form->isSubmitted() && $form->isValid()) {
            $rendezVousRepository->add($rendezVous, true);

            return $this->redirectToRoute('app_admin_rendez_vous_index', [], Response::HTTP_SEE_OTHER);
        }
        
        return $this->renderForm('admin/rendez_vous/new.html.twig', [
            'rendez_vou' => $rendezVous,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/rendez-vous/{id}", name="app_admin_rendez_vous_show", methods={"GET"})
     */
    public function show(RendezVous $rendezVou): Response
    {
        return $this->render('admin/rendez_vous/show.html.twig', [
            'rendez_vou' => $rendezVou,
        ]);
    }

    /**
     * @Route("/rendez-vous/{id}/edit", name="app_admin_rendez_vous_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, RendezVous $rendezVou, RendezVousRepository $rendezVousRepository): Response
    {
        $form = $this->createForm(RendezVousType::class, $rendezVou);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rendezVousRepository->add($rendezVou, true);

            return $this->redirectToRoute('app_admin_rendez_vous_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/rendez_vous/edit.html.twig', [
            'rendez_vou' => $rendezVou,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/rendez-vous/{id}", name="app_admin_rendez_vous_delete", methods={"POST"})
     */
    public function delete(Request $request, RendezVous $rendezVou, RendezVousRepository $rendezVousRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rendezVou->getId(), $request->request->get('_token'))) {
            $rendezVousRepository->remove($rendezVou, true);
        }

        return $this->redirectToRoute('app_admin_rendez_vous_index', [], Response::HTTP_SEE_OTHER);
    }
}
