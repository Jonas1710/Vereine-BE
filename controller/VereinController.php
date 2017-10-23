<?php

require_once '../repository/VereinRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class VereinController
{
    public function index()
    {
        $vereinRepository = new VereinRepository();

        $view = new View('verein_index');
        $view->title = 'Verein';
        $view->heading = 'Verein';
        $view->users = $vereinRepository->readAll();
        $view->display();
    }

    public function create()
    {
        $view = new View('user_create');
        $view->title = 'Verein erfassen';
        $view->heading = 'Verein erfassen';
        $view->display();
    }

    public function doCreate()
    {

    }

    public function delete()
    {
        $vereinRepository = new VereinRepository();
        $vereinRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /verein');
    }
}
