<?php

namespace App\Controller;

use App\Entity\EnderecamentoPostal;
use App\Form\EnderecamentoPostalType;
use App\Repository\EnderecamentoPostalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * @Route("/enderecamento/postal")
 */
class EnderecamentoPostalController extends AbstractController
{
    /**
     * @Route("/", name="enderecamento_postal_index", methods={"GET"})
     */
    public function index(EnderecamentoPostalRepository $enderecamentoPostalRepository): Response
    {
        return $this->render('enderecamento_postal/index.html.twig', [
            'enderecamento_postals' => $enderecamentoPostalRepository->findAll(),
        ]);
    }
 
    public function crear(Request $request): Response
    {
        return $this->renderForm('enderecamento_postal/crear.html.twig');
    }

    /**
     * @Route("/registrar", options= {"expose"=true} , name="registrar", methods={"POST"})
     */
    public function registrar(Request $request)
    {
        $data = $request->request->all(); 
        $entityManager = $this->getDoctrine()->getManager();
    
        $nuevo_cep = intval($data["ar"]['cep']);
        $encontrado = $entityManager->getRepository(EnderecamentoPostal::class)->findOneBy(['cep'=>$nuevo_cep]);
   
        if(!$encontrado){
        $newCep = new EnderecamentoPostal();
        $newCep->setCep($data["ar"]["cep"]);
        $newCep->setLogradouro($data["ar"]["rua"]);
        $newCep->setBairro($data["ar"]["bairro"]);
        $newCep->setLocalidade($data["ar"]["cidade"]);
        $newCep->setUf($data["ar"]["uf"]);
        $newCep->setIbge(intval($data["ar"]["ibge"]));

        $entityManager->persist($newCep);
        $entityManager->flush();
               }   
            return new JsonResponse(array('success' =>'CEP foi registrado com sucesso'));
        }
      

    /**
     * @Route("/new", name="enderecamento_postal_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $enderecamentoPostal = new EnderecamentoPostal();
        $form = $this->createForm(EnderecamentoPostalType::class, $enderecamentoPostal);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($enderecamentoPostal);
        $entityManager->flush();
 
    } 
        return $this->renderForm('enderecamento_postal/new.html.twig', [
            'enderecamento_postal' => $enderecamentoPostal,
            'form' => $form,
        ]);
}

    /**
     * @Route("/{id}", name="enderecamento_postal_show", methods={"GET"})
     */
    public function show(EnderecamentoPostal $enderecamentoPostal): Response
    {
        return $this->render('enderecamento_postal/show.html.twig', [
            'enderecamento_postal' => $enderecamentoPostal,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="enderecamento_postal_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EnderecamentoPostal $enderecamentoPostal): Response
    {
        $form = $this->createForm(EnderecamentoPostalType::class, $enderecamentoPostal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('enderecamento_postal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('enderecamento_postal/edit.html.twig', [
            'enderecamento_postal' => $enderecamentoPostal,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="enderecamento_postal_delete", methods={"POST"})
     */
    public function delete(Request $request, EnderecamentoPostal $enderecamentoPostal): Response
    {
        if ($this->isCsrfTokenValid('delete'.$enderecamentoPostal->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($enderecamentoPostal);
            $entityManager->flush();
        }

        return $this->redirectToRoute('enderecamento_postal_index', [], Response::HTTP_SEE_OTHER);
    }
}
