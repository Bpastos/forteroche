<?php


namespace models;

use views\Contact;

class ContactManager extends Contact
{


    protected   $message,
                $objet,
                $expediteur,
                $email,
                $detinataire = 'augustin.kavera@gmail.com';


    protected function message()
    {
        extract($_POST);
        $this->message = htmlspecialchars('textarea');
        $this->objet = htmlspecialchars('objet');
        $this->expediteur = htmlspecialchars('name');
        $this->email = htmlspecialchars('mail');
    }

    protected function sendMail()
    {
        $this->message();
        $destination = $this->detinataire;
        $expedition = $this->expediteur;
        $objet = $this->objet;
        $email = $this->email;

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "From: $expedition <$email>\r\n Reply-to : $expedition <$email>\nX-Mailer:PHP";

        $message = '<div style="width: 100%; text-align: center; font-weight: bold">'.$this->message .'</div>';

                    if (mail($destination, $objet, $message, $headers)) {
                        echo "<div>L'email a bien été envoyé</div>";
                    } else {
                        echo "<div>Une erreur est survenue, votre email n'a pas été envoyé.<br/>Veuillez réessayer.</div>";
                    }

    }

    protected function email()
    {
        if (!empty($_POST['mail']) && !empty($_POST['objet']) && !empty($_POST['name']) && !empty($_POST['textarea'])) {
            $this->sendMail();
        } else {
            $this->templateContact();
            echo "<div>Veuillez remplir tous les champs</div>";
        }
    }



}