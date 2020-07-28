<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Model\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, MailerInterface $mailer)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('success', sprintf(
                'Merci %s. Votre message %s a bien été envoyé.',
                $contact->getName(),
                $contact->getMessage(),
            ));

            // Send email
            // composer req mailer
            $email = (new Email())
                ->from(new Address($contact->getEmail(), $contact->getName()))
                ->to('admin@site.com')
                ->subject('[Site] '.$contact->getName())
                ->text($contact->getMessage())
                ->html($contact->getMessage());

            dump($mailer);

            $mailer->send($email);
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
