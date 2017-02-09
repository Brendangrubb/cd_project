<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__."/../src/cd.php";

    session_start();

    if (empty($_SESSION['list_of_cds'])) {
        $_SESSION['list_of_cds'] = array();
    }

    $app = new Silex\Application();
    $app['debug'] = true;

    $app->register(
        new Silex\Provider\TwigServiceProvider(),
        array('twig.path'=>__DIR__."/../views")
        );


    $app->get('/', function() use ($app){
        $all_cds = Cd::getAll();
        return $app['twig']->render('root.html.twig', array('all_cds' => $all_cds));
    });

    $app->post('/save_a_cd', function() use ($app) {
        $cd = new Cd($_POST['title']);
        $cd->save();
        return $app['twig']->render('save_a_cd.html.twig', array('newcd' => $cd));
    });

    $app->post('/delete_a_cd', function() use ($app) {
        Cd::deleteAll();
        return $app['twig']->render('delete_all_cds.html.twig');
    });


    return $app;
?>
