<?php
namespace controllers;

use views\Contact;
use models\ContactManager;
class ContactController extends ContactManager
{

    private $contact;

    public function __construct()
    {
        $this->contact = new Contact();
    }

    public function displayContact() {
        $contact = new Contact();
        $contact->templateContact();
    }

    /**
     *
     */
    public function sendMailC()
    {
       parent::sendMail();
    }

    /**
     *
     */
    public function emailC()
    {
        parent::email();
    }


}