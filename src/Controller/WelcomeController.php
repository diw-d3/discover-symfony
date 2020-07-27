<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class WelcomeController extends AbstractController
{
    /**
     * @Route("/hello/{name}", name="hello", requirements={"name"="[a-z_-]{3,8}"})
     */
    public function hello(Request $request, $name = 'matthieu')
    {
        // $name = 'Matthieu';
        $name = ucfirst($name);

        dump($name);
        throw $this->createNotFoundException('Test');

        /* return new Response(
            '<html><body>Hello '.$name.'</body></html>'
        ); */

        dump($this->generateUrl('hello', $request->query->all(), UrlGeneratorInterface::ABSOLUTE_URL));

        return $this->render('welcome/hello.html.twig', [
            'name' => $name,
        ]);
    }

    /**
     * @Route("/hello-format.{_format}")
     */
    public function helloFormat()
    {
        $data = [1, 2, 3];

        return new Response(json_encode($data));
    }

    /**
     * @Route("/services")
     */
    public function services(LoggerInterface $logger)
    {
        $logger->info('On a visité la page');
        // En symfony 3
        // $this->container->get('logger')
        dump($logger);

        return new Response('<body>Test</body>');
    }
}
