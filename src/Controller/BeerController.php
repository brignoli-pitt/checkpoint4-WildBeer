<?php

namespace App\Controller;

use App\Entity\Beer;
use App\Form\BeerType;
use App\Repository\BeerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/beer')]
class BeerController extends AbstractController
{
    #[Route('/', name: 'app_beer_index', methods: ['GET'])]
    public function index(BeerRepository $beerRepository): Response
    {
        return $this->render('beer/index.html.twig', [
            'beers' => $beerRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_beer_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BeerRepository $beerRepository): Response
    {
        $beer = new Beer();
        $form = $this->createForm(BeerType::class, $beer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $beer->setCreatedBy($this->getUser());
            $beerRepository->save($beer, true);

            return $this->redirectToRoute('app_beer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('beer/new.html.twig', [
            'beer' => $beer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_beer_show', methods: ['GET'])]
    public function show(Beer $beer): Response
    {
        return $this->render('beer/show.html.twig', [
            'beer' => $beer,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_beer_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Beer $beer, BeerRepository $beerRepository): Response
    {
        $form = $this->createForm(BeerType::class, $beer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $beer->setCreatedBy($this->getUser());
            $beerRepository->save($beer, true);

            return $this->redirectToRoute('app_beer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('beer/edit.html.twig', [
            'beer' => $beer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_beer_delete', methods: ['POST'])]
    public function delete(Request $request, Beer $beer, BeerRepository $beerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$beer->getId(), $request->request->get('_token'))) {
            $beerRepository->remove($beer, true);
        }

        return $this->redirectToRoute('app_beer_index', [], Response::HTTP_SEE_OTHER);
    }
}
