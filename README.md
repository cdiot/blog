# Blog

This is a blog developed without a framework.

## Environnement de développement

### Pré-requis

*   PHP 7.4
*   MySQL
*   Apache
*   Composer
*   Windows 10
*   Wamp

### Téléchargement

To download the project typed the following commands:

```bash
cd C:/wamp64/www
git clone https://github.com/cdiot/blog.git
```

!!! : After cd enter your path

### Lancer l'environnement de développement

To start the development environment typed the following command:

```bash
composer install
```

### Base De Données

To install the database, download the file at this adress `https://drive.google.com/drive/folders/11XJZy-XMX0onGeZ3U7VU-vFZYgiBV2K7?usp=sharing` and copy the file to a blank database of your DBMS named `blog`.

You can configure environment variables by renaming the .env.example file to
.env and enter your database login credentials.

### Configurer Fake Sendmail

Click on the links below to download sendmail.exe. Once unzip copy the content at the root of wamp in a folder called sendmail.

*   Fake Sendmail : http://glob.com.au/sendmail/

Then go to the sendmail folder then in the sendmail.ini file enter the information below
and replace the information with yours:

```bash
 (sendmail.ini)
smtp_server=smtp.gmail.com
smtp_port=587
default_domain=gmail.com
auth_username=****votremail****@gmail.com
auth_password=****votremdp****
force_sender=****votremail****@gmail.com
```

Finally go to this folder `C:\wamp64\bin\apache\apache2.4.46\bin` then in the php.ini file entered the information below;

```bash
(php.ini)
sendmail_path="****\sendmail\sendmail.exe"
```
