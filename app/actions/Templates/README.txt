Procèdure pour ajouter un template:
  . Ajouter un controller avec minimum method index.
  . ajouter la route dans le fichier de config :

  'NEWTEMPLATE/:issue' => array(
      'action' => 'templates/newsletter/index'
  ),
  .Ajouter un dossier correspondant au nouveau template dans la vue
