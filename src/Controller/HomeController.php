<?php
/**
 * Created by PhpStorm.
 * User: pcp17
 * Date: 03/07/2018
 * Time: 10:51
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller {
    /**
     * @Route("/", name="home")
     */
    public function home() {
        return $this->render('index.html.twig');
    }
}