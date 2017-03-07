<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 7-3-17
 * Time: 15:56
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class GenusController
{
    /**
     * @Route("/genus")
     * @return Response
     */
    public function showAction()
    {
        return new Response('Under the sea!');
    }
}