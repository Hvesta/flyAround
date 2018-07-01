<?php
/**
 * Created by PhpStorm.
 * User: aurelie
 * Date: 25/06/18
 * Time: 11:10
 */

namespace AppBundle\Service;



class Mailer
{

    private $mailer;
    private $templating;


    /**
     * Mailer constructor.
     * @param \Swift_Mailer $mailer
     * @param \Twig_Environment $templating
     */
    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    public function sendEmail($to, $type)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject($type)
            ->setFrom('hvest.au@gmail.com')
            ->setTo($to)
            ->setContentType('text/html')
            ->setBody($this->templating->render('email/'.$type.'.html.twig'));

        $this->mailer->send($message);
    }

}