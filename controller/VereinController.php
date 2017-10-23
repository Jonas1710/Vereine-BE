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
        $view->vereine = $vereinRepository->readAll();
        $view->display();
    }

    public function create()
    {
        $view = new View('verein_create');
        $view->title = 'Verein erfassen';
        $view->heading = 'Verein erfassen';
        $view->display();
    }

    public function doCreate()
    {
      if ($_POST['send']) {
          $name = $_POST['name'];
          $kategorie = $_POST['kategorie'];
          $mitgliederanzahl = $_POST['mitgliederanzahl'];
          $bild = $_POST['bild'];
          $gründungsjahr = $_POST['gründungsjahr'];
          $beschreibung = $_POST['beschreibung'];

          $vereinRepository = new VereinRepository();
          $vereinRepository->create($name, $kategorie, $mitgliederanzahl, $bild, $gründungsjahr, $beschreibung);
      }

      // Anfrage an die URI /user weiterleiten (HTTP 302)
      header('Location: /verein');
    }

    public function delete()
    {
        $vereinRepository = new VereinRepository();
        $vereinRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /verein');
    }
}
