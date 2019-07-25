<?php
// src/Controller/AdvertController.php

//First Part

// namespace App\Controller;

// use Symfony\Component\HttpFoundation\Response;
// use Twig\Environment;

// class AdvertController
// {
//   public function index(Environment $twig)
//   {
//     //$content = $twig->render('Advert/index.html.twig');
//     $content = $twig->render('Advert/index.html.twig', ['name' => 'winzou']);

//     return new Response($content);
//   }
//   // public function bye(Environment $twig)
//   // {
//   //   $content = $twig->render('Advert/index2.html.twig');

//   //   return new Response($content);
//   // }
// }

//Second Part

// src/Controller/AdvertController.php

// 
//Third Part

// namespace App\Controller;

// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\Routing\RouterInterface;
// use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

// // $url = $router->generate('oc_advert_list', [], UrlGeneratorInterface::ABSOLUTE_URL);

// /**
//  * @Route("/advert")
//  */
// class AdvertController
// {
//   /**
//    * @Route("/", name="oc_advert_index")
//    */
//   public function index(RouterInterface $router)
//   {
//     $url = $router->generate(
//         'oc_advert_view', // 1er argument : le nom de la route
//         ['id' => 5]       // 2e argument : les paramètres
//     );
//     // $url vaut « /advert/view/5 »

//     return new Response("L'URL de l'annonce d'id 5 est : ".$url);
//   }
// }

//
//Fourth Part

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
* @Route("/advert")
*/
class AdvertController extends Controller
{
  /**
  * @Route("/view/{id}", name="oc_advert_view", requirements={"id" = "\d+"})
  */
  public function view($id, Request $request)
  {
    // On récupère notre paramètre tag
    $tag = $request->query->get('tag');

    return new Response(
      "Affichage de l'annonce d'id : ".$id.", avec le tag : ".$tag
    );
  }
  /**
   * @Route("/add", name="oc_advert_add")
   */
  public function add()
  {
    return new Response ("Add");
  }
  /**
   * @Route("/edit/{id}", name="oc_advert_edit", requirements={"id" = "\d+"})
   */
  public function edit($id)
  {
    return new Response ("Edit : ".$id);
  }
  /**
   * @Route("/delete/{id}", name="oc_advert_delete", requirements={"id" = "\d+"})
   */
  public function delete($id)
  {
    return new Response ("Delete : ".$id);
  }
  /**
  * @Route("/viewError/{id}", name="oc_advert_view", requirements={"id" = "\d+"})
  */
  public function viewError($id, Request $request)
  {
    // On crée la réponse sans lui donner de contenu pour le moment
    $response = new Response();

    // On définit le contenu
    $response->setContent("Ceci est une page d'erreur 404");

    // On définit le code HTTP à « Not Found » (erreur 404)
    $response->setStatusCode(Response::HTTP_NOT_FOUND);

    // On retourne la réponse
    return $response;
  }
  /**
  * @Route("/viewT/{id}", name="oc_advert_view", requirements={"id" = "\d+"})
  */
  public function viewT($id, Request $request)
  {
    $tag = $request->query->get('tag');
    // On utilise le raccourci : il crée un objet Response
    // Et lui donne comme contenu le contenu du template
    return $this->render(
      'Advert/viewT.html.twig',
      ['id'  => $id, 'tag' => $tag]
    );
  }
}

