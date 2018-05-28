<?php
/**
 * Created by PhpStorm.
 * User: aragorn
 * Date: 28/05/18
 * Time: 11:04
 */

namespace AppBundle\Service;


use AppBundle\AppBundle;

class Mailer
{
    const TYPE = ['notification', 'confirmation'];
    protected $mailer;
    protected $templating;

    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
    {
       $this->mailer = $mailer;
       $this->templating = $templating;
    }

    public function sendMail($sender, $recipient, $content, $type )
    {
        $message = \Swift_Message::newInstance();
        $template = 'mail/template.html.twig';
        $body = $this->templating->render($template, ['user' => $recipient, 'content' => $content, 'type' => $type]);
            // Pilot mail
            $message
                ->setFrom($sender)
                ->setTo($recipient->getEmail())
                ->setSubject($type)
                ->setBody($body, 'text/html');
            $this->mailer->send($message);

    }
}