# Auth Admin PHP
------------------------

## What's this
Projet d'un espace administration avec du PHP Orienté Objet.
Ce projet n'utilise pas de MVC

## Fonctionnalités
le script contient les fonctionnalités suivantes :
- Une partie inscription, avec confirmation par email des comptes utilisateurs.
- Une partie connexion / déconnexion, avec une option Se souvenir de moi basée sur l'utilisation des cookies.
- Une option rappel du mot de passe pour les utilisateurs un petit peu tête en l'air.
- Une partie réservé aux membres avec la possibilités de changer son mot de passe.

## Comment l'installer
Pour cela, il suffit de :
- Copier le repository
- mettre en place la BDD

## Configuration
- Pour configuer l'accès à la base de données : ```inc/db.php```
- Afin de configurer la base de données vous pouvez :
    - Importer la BDD ```admin.sql``` se trouvant dans le dossier courant

- J'ai utilisé xampp comme émulateur de serveur. Ceux qui utiliseront wamp devrons donc apporter quelques modification dans inc/auth.php lignes 48, 176. Il faut mettre le bon chemin pour la validation par mail. 


## Logiciel Annexe
- Installer maildev sur votre laptop afin de tester l'envoi et la réception de mail en local.



## License
Utilisation de la [Licence_MIT] (https://fr.wikipedia.org/wiki/Licence_MIT "link to Licence_MIT").
La licence donne à toute personne recevant le logiciel le droit illimité de l'utiliser, le copier, le modifier, le fusionner, le publier, le distribuer, le vendre et de changer sa licence. La seule obligation est de mettre le nom des auteurs avec la notice de copyright.