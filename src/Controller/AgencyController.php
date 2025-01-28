<?php

namespace App\Controller;

use App\Entity\Agency;
use App\Form\AgencyType;
use App\Repository\AgencyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/agency')]
class AgencyController extends AbstractController
{
    #[Route('/', name: 'agency_index', methods: ['GET'])]
    public function index(Request $request, AgencyRepository $agencyRepository): Response
    {
        $page = $request->query->getInt('page', 1);
        $limit = 10;
        
        $filter = $request->query->get('filter');
        $queryBuilder = $agencyRepository->createQueryBuilder('a');
        
        if ($filter) {
            $queryBuilder
                ->where('a.telephone LIKE :filter')
                ->orWhere('a.adresse LIKE :filter')
                ->setParameter('filter', '%'.$filter.'%');
        }
        
        $agencies = $queryBuilder
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
            
        return $this->render('agency/index.html.twig', [
            'agencies' => $agencies,
            'current_page' => $page,
            'limit' => $limit
        ]);
    }

    #[Route('/new', name: 'agency_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $agency = new Agency();
        $form = $this->createForm(AgencyType::class, $agency);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($agency);
            $entityManager->flush();

            return $this->redirectToRoute('agency_index');
        }

        return $this->render('agency/new.html.twig', [
            'agency' => $agency,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'agency_delete', methods: ['POST'])]
    public function delete(Request $request, Agency $agency, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$agency->getId(), $request->request->get('_token'))) {
            $entityManager->remove($agency);
            $entityManager->flush();
        }

        return $this->redirectToRoute('agency_index');
    }
}
