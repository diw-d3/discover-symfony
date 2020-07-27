<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Routing\Annotation\Route;

class DemoController extends AbstractController
{
    /**
     * @Route("/demo", name="demo")
     */
    public function index(Request $request, SessionInterface $session)
    {
        // Récupérer $_GET['a']
        $request->query->get('a');
        // $request->get('a'); => $_GET['a'] ou $_POST['a']

        dump($request->server->get('REMOTE_ADDR'));

        // Afficher un élément de la session
        dump($session->get('name'));

        $cars = [
            ['name' => 'Renault'],
            ['name' => 'Peugeot'],
        ];

        return $this->render('demo/index.html.twig', [
            'controller_name' => 'DemoController',
            'cars' => $cars,
        ]);
    }

    /**
     * @Route("/put-in-session", name="session")
     */
    public function putInSession(SessionInterface $session)
    {
        // Mettre un élément en session
        dump($session);
        $session->set('name', 'toto');

        return new Response('<body>Session</body>');
    }

    /**
     * @Route("/toto.pdf", name="pdf")
     */
    public function downloadPDF()
    {
        // Logique de sécurité
        $authorized = (bool) rand(0, 1);

        if (!$authorized) {
            throw new AccessDeniedHttpException('Interdit');
        }

        return $this->file('./cv.pdf', 'new_file.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
    }
}
