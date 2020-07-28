<?php

namespace App\Controller;

use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class PostController extends AbstractController
{
    private $markdown;

    public function __construct(MarkdownParserInterface $markdown)
    {
        $this->markdown = $markdown;
    }

    /**
     * @Route("/post", name="post")
     */
    public function index(MarkdownParserInterface $markdown, AdapterInterface $cache, Environment $twig)
    {
        $post = "# Titre de l'article
Contenu de l'article

- Item 1
- Item 4
- Item 3

[Un lien](https://google.fr)";

        dump($twig === $this->get('twig'));
        dump($markdown);
        dump($markdown === $this->markdown);
        $item = $cache->getItem('post_'.md5($post));

        if ($item->isHit()) { // Si le md5 est en cache
            $html = $item->get();
        } else {
            // sleep(2);
            $html = $markdown->transformMarkdown($post);
            $item->set($html);
            $cache->save($item);
        }

        return $this->render('post/index.html.twig', [
            'html' => $html,
        ]);
    }
}
