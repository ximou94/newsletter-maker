<?php

Atomik::set(array(
    'base_dir' => 'C:\wamp642\www\responsive-newsletter-maker-V3',
    'plugins' => array(
        'DebugBar' => array(
            // if you don't include jquery yourself as it is done in the
            // skeleton, comment out this line (the debugbar will include jquery)
            'include_vendors' => 'css'
        ),
        'Errors' => array(
            'catch_errors' => true
        ),
        'Session',
        'Flash',
        'Controller',
        'Db' => array(
                'dsn' => 'mysql:host=localhost;dbname=newsletter_maker',
                'username' => 'root',
                'password' => ''
            )
    ),

    'atomik' => array(
		    'url_rewriting' => true,
        'debug' => true,
        'model_dirs' => 'app/models'
    ),

    'language'=> array(
        'autodetect' => false,
    ),
    'app' => array(
      'layout' => '_layout',
      'language' => 'fr',
      'routes' => array(

        /*TEMPLATES*/
        'templates' => array(
            '@name'  => 'default',
            'action' => 'Templates/default/index'
        ),

        /*Ajouter pour chaque nouveau template*/
        'newsletter/:issue' => array(
            'action' => 'templates/newsletter/index'
        ),
        'flash/:issue' => array(
            'action' => 'templates/flash/index'
        ),
        'topfive/:issue' => array(
            'action' => 'templates/topfive/index'
        ),
        'rh/:issue' => array(
            'action' => 'templates/rh/index',
        ),

        /*ISSUES*/
        'issues' => array(
            '@name'  => 'default',
            'action' => 'Issues/default/index'
        ),

        'create/:template/audio' => array(
            'action' => 'issues/audio/index'
        ),
        'create/:template/biologiste' => array(
            'action' => 'issues/biologiste/index'
        ),
        'create/:template/nutrition' => array(
            'action' => 'issues/nutrition/index'
        ),
        'create/:template/audiologyIT' => array(
            'action' => 'issues/audioit/index'
        ),
        'create/:template/audiologyBR' => array(
            'action' => 'issues/audiobr/index'
        ),
        'create/:template/audiologyPB' => array(
            'action' => 'issues/audiopb/index'
        ),
        'create/:template/audiologyDE' => array(
            'action' => 'issues/audiode/index'
        ),
        'create/:template/audition' => array(
            'action' => 'issues/audition/index'
        ),
        'create/:template/audiologyWN' => array(
            'action' => 'issues/audiologywn/index'
        ),
        'create/:template/audioenportada' => array(
            'action' => 'issues/audioes/index'
        ),
        'create/:template/pharma' => array(
            'action' => 'issues/pharma/index'
        ),
        'create/:template/dentaire' => array(
            'action' => 'issues/dentaire/index'
        ),
        'create/:template/audiology' => array(
            'action' => 'issues/audiology/index'
        ),
        'create/:template/orthophile' => array(
            'action' => 'issues/orthophile/index'
        ),
        'create/:template/dentoscope' => array(
            'action' => 'issues/dentoscope/index'
        ),
      )
    ),
));
