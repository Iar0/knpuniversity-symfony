<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 7-3-17
 * Time: 15:56
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Genus;
use ClassesWithParents\G;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GenusController extends Controller
{
    /**
     * @Route("/genus/new")
     */
    public function newAction()
    {
        $genus = new Genus();
        $genus->setName('Genus'.rand(1,100));
        $genus->setSpeciesCount(rand(1,100));
        $genus->setSubFamily('fasfda');

        $em = $this->getDoctrine()->getManager();
        $em->persist($genus);
        $em->flush();

        return new Response("<html><body>Genus created</body></html>");
    }

    /**
     * @Route("/genus")
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

        $genuses = $em->getRepository('AppBundle:Genus')
            ->findAllPublishedOrderBySize();

        return $this->render('genus/list.html.twig', [
            'genuses' => $genuses
        ]);
    }

    /**
     * @Route("/genus/{genusName}", name="genus_show")
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

//        $funFact = 'Octopuses can change the color of their body in just *three-tenths* of a second!';
//
//        $cache = $this->get('doctrine_cache.providers.my_markdown_cache');
//        $key = md5($funFact);
//
//        if ($cache->contains($key)) {
//            $funFact = $cache->fetch($key);
//        } else {
//            sleep(1);
//            $funFact = $this->get('markdown.parser')->transform($funFact);
//            $cache->save($key, $funFact);
//        }

        $em = $this->getDoctrine()->getManager();

        $genus = $em->getRepository('AppBundle:Genus')
            ->findOneBy([
                'name' => $genusName
            ]);

        if (!$genus) {
            throw $this->createNotFoundException('Genus not found!');
        }

        return $this->render('genus/show.html.twig', [
            'genus' => $genus,
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
     * @Route("/genus/{genusName}/notes", name="genus_show_notes")
     * @Method("GET")
     */
    public function getNotesAction($genusName)
    {
        $notes = [
            ['id' => 1, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Octopus asked me a riddle, outsmarted me', 'date' => 'Dec. 10, 2015'],
            ['id' => 2, 'username' => 'AquaWeaver', 'avatarUri' => '/images/ryan.jpeg', 'note' => 'I counted 8 legs... as they wrapped around me', 'date' => 'Dec. 1, 2015'],
            ['id' => 3, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Inked!', 'date' => 'Aug. 20, 2015'],
        ];

        $data = array(
            'notes' => $notes
        );

        return new JsonResponse($data);
    }
}