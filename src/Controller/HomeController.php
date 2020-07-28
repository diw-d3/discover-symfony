<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class HomeController extends AbstractController
{
    /**
     * @Route(
     *   "/{_locale}",
     *   name="home",
     *   defaults={"_locale"="fr"},
     *   requirements={"_locale"="fr|en"}
     * )
     */
    public function index(TranslatorInterface $translator)
    {
        $this->addFlash('success', $translator->trans('To translate'));

        $name = 'Toto';

        // $translator->trans('Hello %name%', ['%name%' => $name]);

        return $this->render('home/index.html.twig', [
            'name' => $name,
        ]);
    }
}
