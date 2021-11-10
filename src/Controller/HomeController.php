<?php

namespace App\Controller;

use App\Form\SearchVilleType;
use App\Repository\VillesRepository;
use App\Service\CallApiService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{

  /**
   * @Route("/", name="homepage")
   */
  public function home(VillesRepository $villesRepository, Request $request)
  {

    // $villes = $villesRepository->findAll();
    $villes = [];
    $form = $this->createForm(SearchVilleType::class);
    $search = $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $villes = $villesRepository->search($search->get('nom')->getData());
    }

    return $this->render('home.html.twig', [
      'form' => $form->createView(),
      'villes' => $villes
    ]);
  }


  /**
   * @Route("/villes", name="villes_list")
   */
  public function showAll(CallApiService $callApiService, PaginatorInterface $paginator, Request $request): Response
  {

    $data = $callApiService->getData();
    $villes = $paginator->paginate($data, $request->query->getInt('page', 1), 10);

    // dd($villes);
    return $this->render('villes.html.twig', [
      'data' => $villes
    ]);
  }

  /**
   * @Route("/ville/{id}", name="ville")
   */
  public function show($id, CallApiService $callApiService)
  {

    // dd($callApiService->getOneData($id)[0]);
    return $this->render('ville.html.twig', [
      'ville' => $callApiService->getOneData($id)[0]
    ]);
  }
}
