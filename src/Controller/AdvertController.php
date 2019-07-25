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

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
* @Route("/advert")
*/
class AdvertController
{
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
}

