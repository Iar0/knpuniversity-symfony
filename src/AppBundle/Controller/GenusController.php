<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 7-3-17
 * Time: 15:56
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GenusController extends Controller
{
    /**
     * @Route("/")
     * @return Response
     */
    public function indexAction()
    {
        return new Response('index');
    }

    /**
     * @Route("/genus/{genusName}")
     * @return Response
     */
    public function showAction($genusName)
    {
        $notes = array();

        if ($genusName == 'octopus') {
            $notes = [
                'Octopus asked me a riddle, outsmarted me',
                'I counted 8 legs... as they wrapped around me',
                'Inked!'
            ];
        }

        return $this->render('genus/show.html.twig', [
            'name' => $genusName,
            'notes' => $notes
        ]);

//        $templating = $this->container->get('templating');
//
//        $html = $templating->render('genus/show.html.twig', [
//            'name' => $genusName
//        ]);
//
//        return new Response($html);
    }

    /**
     * @Route("/genus/{genusName}/notes")
     * @Method("GET")
     */
    public function getNotesAction($genusName)
    {
        
    }
}