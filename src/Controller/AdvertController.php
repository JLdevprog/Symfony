<?php
// src/Controller/AdvertController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class AdvertController
{
  public function index(Environment $twig)
  {
    //$content = $twig->render('Advert/index.html.twig');
    $content = $twig->render('Advert/index.html.twig', ['name' => 'winzou']);

    return new Response($content);
  }
  public function bye(Environment $twig)
  {
    $content = $twig->render('Advert/index2.html.twig');

    return new Response($content);
  }
}