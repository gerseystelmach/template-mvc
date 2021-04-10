<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

class HomeController extends AbstractController
{
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */

     // Enfin, pour afficher un fichier de vue, tu utiliseras la méthode render de Twig,
     //qui prend en paramètre le nom du fichier de vue (qui doit se trouver dans le répertoire configuré dans le loader).
     // En second paramètre, tu passeras à la méthode render un tableau contenant toutes
     // les variables que tu souhaites afficher dynamiquement dans ta vue.



    public function index()
    {

        return $this->twig->render('Home/index.html.twig') . $this->showProducts();
    }


    public function showProducts()
    {
         $products = ['guitare', 'bass', 'bonjo', 'cithare', 'lyre', 'flaute'];
         return $this->twig->render('Home/products.html.twig', ['products' => $products]);
    }
}
