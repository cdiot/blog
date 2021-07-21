<?php

namespace App\Controller;

use App\HTTP\Request;

/**
 * Home Controller 
 */
class HomeController extends Controller
{

    public function index()
    {
        return $this->view('home/index');
    }

    public function sendMail()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $request = new Request();

            $firstname = $request->getPost('firstname');
            $lastname = $request->getPost('lastname');
            $mail = filter_var($request->getPost('mail'), FILTER_VALIDATE_EMAIL);
            $subject = $request->getPost('subject');

            // Ecrit et envoie l'email  
            $header  = "MIME-Version: 1.0\r\n";
            $header .= 'From: "blog.online"<christopher.diot5@gmail.com>' . "\n";
            $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
            $header .= 'Content-Transfer-Encoding: 8bit';
            $message = '
              <html>
              <head>
                <title>Formulaire de contact</title>
                <meta charset="utf-8" />
              </head>
              <body>
                  <div align="center">
                    <p> Cette e-mail fait suite à la demande de <strong>' . $firstname . ' - ' . $lastname . '</strong><br><br> Via l\'adresse mail suivante: <strong>' . $mail . '</strong>.<br><br>
                          ' . $subject . '<br><br></p>                                        
                  </div>
              </body>
              </html>
              ';
            mail("christopher.diot5@gmail.com", "Prise de contact via le formulaire", $message, $header);
            echo "envoie confirmer";
            return header('Location: /');
        }
    }
}
