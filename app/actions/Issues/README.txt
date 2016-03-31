Procèdure pour ajouter un magazine:
  . Ajouter un controller avec minimum method index.
  . ajouter la route dans le fichier de config :

      'create/:template/MAGAZINE' => array(
          'action' => 'issues/MAGAZINE/index'
      ),
