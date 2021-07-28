# Blog

Il s'agit d'un blog développés sans Framework.

## Environnement de développement 

### Pré-requis

* PHP 7.4
* MySQL
* Apache
* Composer

### Lancer l'environnement de développement 

Pour démarrer l'environnement de développement tapé les commandes suivantes :

```bash
composer install
```

Vous pouvez configurer les variables d'environnement en renomment le fichier .env.example en
.env

### Base De Données

Pour installer la base de données, copier dans votre SGBD le fichier ```blog.sql``` présent dans le dossier bdd du projet.

### Configurer Fake Sendmail

Clicker sur les liens ci-dessous pour télécharger sendmail.exe. Une fois dézipper copier le contenu à la racine de wamp dans un dossier qu'on nommera sendmail. 

 - Fake Sendmail : http://glob.com.au/sendmail/

Ensuite aller dans le dossier sendmail puis dans le fichier sendmail.ini entré les informations ci-dessous:

```bash
 (sendmail.ini)
smtp_server=smtp.gmail.com
smtp_port=587
default_domain=gmail.com
auth_username=****votremail****@gmail.com
auth_password=****votremdp****
force_sender=****votremail****@gmail.com
```

Enfin aller dans ce dossier ```C:\wamp64\bin\apache\apache2.4.46\bin``` puis dans le fichier php.ini entré les informations ci-dessous;

```bash
(php.ini)
sendmail_path="****\sendmail\sendmail.exe"
```

Me contacter pour toute question supplémentaire. 

### Lancer CodeSniffer

Pour lancer un test de qualité tapé les commandes suivantes :

```bash
./vendor/bin/phpcs -p ./src
./vendor/bin/phpcbf -p ./src
```
