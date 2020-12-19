<?php


namespace Site\Controller\Ajax;


use Site\Model\Ticket;

class TicketController extends LayoutController
{
    public function post()
    {
//        var_dump($this->f());exit();
        if(!$form = $this->f('form')){
            $this->setErrorMessageAndExit('Ошибка');
        }

        $email = $form['email'];
        $name = $form['name'];
        $phone = $form['phone'];
        $service_id = $form['service_id'];

        $ticket = new Ticket();
        $ticket->setName($name);
        $ticket->setPhone($phone);
        $ticket->setDescription($service_id);
        $ticket->save();
    }
}