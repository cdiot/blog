<?php
/**
 * Home Controller Doc Comment
 * 
 * PHP version 7
 * 
 * @category Controller
 * @package  Src/Controller
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
namespace App\Controller;

/**
 * Home Controller Doc Comment
 * 
 * Home Controller
 * 
 * @category Controller
 * @package  Src/Controller
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
class HomeController extends Controller
{

    /**
     * Show default page
     * 
     * @return [type]
     */
    public function index()
    {
        return $this->view('home/index');
    }

    /**
     * Send Mail 
     * 
     * @return [type]
     */
    public function sendMail()
    {
        if ($this->request->getServer('REQUEST_METHOD') == 'POST') {

            $firstname = $this->request->getPost('firstname');
            $lastname = $this->request->getPost('lastname');
            $mail = filter_var($this->request->getPost('mail'), FILTER_VALIDATE_EMAIL);
            $subject = $this->request->getPost('subject');

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
