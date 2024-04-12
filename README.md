# gestionApprenants

## Projet 
Le projet consiste à réaliser un site de gestion des apprenants. Lors de la connexion, si l'utilisateur est un formateur il peut: 
- générer un code aléatoire à 5 chiffres correspondant au cours
- voir le tableau des promotions
- ajouter une promotion, la modifier ou la supprimer
- modifier les présences, absences ou retards des apprenants

Si l'utilisateur est un apprenant : il peut enregistrer le code du cours dans un temps imparti. Si celui-ci dépasse 15 minutes, il est en retard. 

Lors de la création de l'apprenant, un mail lui est envoyé pour qu'il crée un code.
Lors de 3 retards, un mail lui est envoyé pour lui rappeler qu'il doit ramener un gâteau. 

## Configuration

Pour que le projet puisse fonctionner, il est nécessaire de configurer le fichier config. 
La base de données se trouve dans le fichier Migration. 
Créer un localhost sur la branche public. 

## Realisation

Sur la base MVC(Model Vue Controller), avec redirection afin d'éviter que l'utilisateur n'ait accès aux fichiers administrateurs. Les redirections se font à l'aide de .htaccess dans le fichier source et dans le fichier public.
Les données sont vérifiées en javascript et en PHP. 

## Test 
Le test est possible pour la version formateur avec les identifiants:
mail: elodielo20@gmail.com 
mdp:elo
Et pour la version apprenant: 
mail : elodielo20@gmal.com
mdp : elo

## Site en ligne accessible à cette adresse: