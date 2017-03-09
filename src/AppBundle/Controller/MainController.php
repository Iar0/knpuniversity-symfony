<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 9-3-17
 * Time: 12:02
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function homepageAction()
    {
        $title = 'Welcome Aquanauts!';
        return $this->render('main/homepage.html.twig', [
            'title' => $title
        ]);
    }
}