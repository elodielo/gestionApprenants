<?php
      // lors de la mise en open source, remplacer les infos concernant la base de données.

      
      // EN LOCAL :
      define('DB_HOST', 'localhost');
      define('DB_NAME', 'gestionapprenants');
      define('DB_USER', 'gestionApprenants');
      define('DB_PWD', 'gestion123');
      define('PREFIXE', 'gest_');
      
      // Si le nom de domaine ne pointe pas vers le dossier public, indiquer le chemin entre le nom de domaine et le dossier public.
      // exemple: /mon-site/public/
      // Pour filezilla
      // define('HOME_URL', '/elodiel/gestionApprenants/public/');

      // EN LOCAL :
      define('HOME_URL', '/');
      
      // Ne pas toucher :
      
      define('DB_INITIALIZED', TRUE);