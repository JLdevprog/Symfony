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

// namespace App\Controller;

// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\Routing\RouterInterface;
// use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// use Symfony\Component\HttpFoundation\RedirectResponse;

// /**
// * @Route("/advert")
// */
// class AdvertController extends AbstractController
// {
//   /**
//   * @Route("/view/{id}", name="oc_advert_view", requirements={"id" = "\d+"})
//   */
//   public function view($id, Request $request)
//   {
//     // On récupère notre paramètre tag
//     $tag = $request->query->get('tag');

//     return new Response(
//       "Affichage de l'annonce d'id : ".$id.", avec le tag : ".$tag
//     );
//   }
//   /**
//    * @Route("/add", name="oc_advert_add")
//    */
//   public function add()
//   {
//     return new Response ("Add");
//   }
//   /**
//    * @Route("/edit/{id}", name="oc_advert_edit", requirements={"id" = "\d+"})
//    */
//   public function edit($id)
//   {
//     return new Response ("Edit : ".$id);
//   }
//   *
//    * @Route("/delete/{id}", name="oc_advert_delete", requirements={"id" = "\d+"})
   
//   public function delete($id)
//   {
//     return new Response ("Delete : ".$id);
//   }
//   // /**
//   // * @Route("/viewError/{id}", name="oc_advert_view", requirements={"id" = "\d+"})
//   // */
//   // public function viewError($id, Request $request)
//   // {
//   //   // On crée la réponse sans lui donner de contenu pour le moment
//   //   $response = new Response();

//   //   // On définit le contenu
//   //   $response->setContent("Ceci est une page d'erreur 404");

//   //   // On définit le code HTTP à « Not Found » (erreur 404)
//   //   $response->setStatusCode(Response::HTTP_NOT_FOUND);

//   //   // On retourne la réponse
//   //   return $response;
//   // }
//   // /**
//   // * @Route("/viewT/{id}", name="oc_advert_view", requirements={"id" = "\d+"})
//   // */
//   // public function viewT($id, Request $request)
//   // {
//   //   $tag = $request->query->get('tag');
//   //   // On utilise le raccourci : il crée un objet Response
//   //   // Et lui donne comme contenu le contenu du template
//   //   return $this->render(
//   //     'Advert/viewT.html.twig',
//   //     ['id'  => $id, 'tag' => $tag]
//   //   );
//   // }
// }

//
//Fifth Part
// src/Controller/AdvertController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/advert")
 */
class AdvertController extends AbstractController
{
  /**
   * @Route("/{page}", name="oc_advert_index", requirements={"page" = "\d+"}, defaults={"page" = 1})
   */
  public function index($page)
  {
    // On ne sait pas combien de pages il y a
    // Mais on sait qu'une page doit être supérieure ou égale à 1
    if ($page < 1) {
      // On déclenche une exception NotFoundHttpException, cela va afficher
      // une page d'erreur 404 (qu'on pourra personnaliser plus tard d'ailleurs)
      throw $this->createNotFoundException('Page "'.$page.'" inexistante.');
    }

    // Ici, on récupérera la liste des annonces, puis on la passera au template

    // Mais pour l'instant, on ne fait qu'appeler le template
    return $this->render('Advert/index.html.twig');
  }

  /**
   * @Route("/view/{id}", name="oc_advert_view", requirements={"id" = "\d+"})
   */
  public function view($id)
  {
    // Ici, on récupérera l'annonce correspondante à l'id $id

    return $this->render('Advert/view.html.twig', [
        'id' => $id,
    ]);
  }

  /**
   * @Route("/add", name="oc_advert_add")
   */
  public function add(Request $request)
  {
    // La gestion d'un formulaire est particulière, mais l'idée est la suivante :

    // Si la requête est en POST, c'est que le visiteur a soumis le formulaire
    if ($request->isMethod('POST')) {
      // Ici, on s'occupera de la création et de la gestion du formulaire

      $this->addFlash('notice', 'Annonce bien enregistrée.');

      // Puis on redirige vers la page de visualisation de cettte annonce
      return $this->redirectToRoute('oc_advert_view', ['id' => 5]);
    }

    // Si on n'est pas en POST, alors on affiche le formulaire
    return $this->render('Advert/add.html.twig');
  }

  /**
   * @Route("/edit/{id}", name="oc_advert_edit", requirements={"id" = "\d+"})
   */
  public function edit($id, Request $request)
  {
    // Ici, on récupérera l'annonce correspondante à $id

    // Même mécanisme que pour l'ajout
    if ($request->isMethod('POST')) {
      $this->addFlash('notice', 'Annonce bien modifiée.');

      return $this->redirectToRoute('oc_advert_view', ['id' => 5]);
    }

    return $this->render('Advert/edit.html.twig');
  }

  /**
   * @Route("/delete/{id}", name="oc_advert_delete", requirements={"id" = "\d+"})
   */
  public function delete($id)
  {
    // Ici, on récupérera l'annonce correspondant à $id

    // Ici, on gérera la suppression de l'annonce en question

    return $this->render('Advert/delete.html.twig');
  }
}


