
## Installation du projet
  - git clone https://github.com/pabal15522/gestion_evenment.git
  - composer update
  - Faire la migration : php artisan migrate
  - Tape ipconfig(windows) pour recuperer l'adresse Ip de la machine et remplace le contenu de la variable APP_URL dans .env
  - Demarrer le server:   php artisan serve --host=0.0.0.0 --port=8000   
  - Utiliser Insomnia ou postman pour tester
  - 
## La base donnée
Pour la base de donnée j'ai opté pour le SQlite.

## Validation des données
Pour la validation j'ai mis en place le fichier ErrorCode.php pour emuméré les différente code d'erreur possible et le fichier EventRegisterRequest pour le controlle des champs pour l'enrégistrement d'un évènement.

j'ai ajouté deux méthode dans controller (succes et error) qui me permet de retourner les données en fonction du code d'erreur.

Concenant la validation pour la mise a jour d'évènment je devrais créer un autre ficher request EventUpdateRequest en precisant les champs concernés.

## Perspectives
    Protéger les routes pour les actions critiques (supression d'un evenement,ajout ou modification d'un evenement,....)
    Mettre en place le système de gestion des droits(roles , permissions) pour les gestionnaire

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
