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

    public function category()
    {
      $vereinRepository = new VereinRepository();

      $view = new View('verein_index');
      $view->kategorie = $_GET['kategorie'];
      $view->title = 'Kategorie';
      $view->heading = 'Kategorie';
      $view->vereine = $vereinRepository->getByCategory($view->kategorie);
      $view->display();
    }

    public function detail()
    {
        $vereinRepository = new VereinRepository();

        $view = new View('verein_detail');
        $view->heading = "";
        $view->verein = $vereinRepository->readById($_GET['id']);
        $view->title = $view->verein->name;
        $view->display();
    }

    public function update ()
    {
        $vereinRepository = new VereinRepository();

        $view = new View('verein_update');
        $view->title = "Verein";
        $view->heading = "Verein bearbeiten";
        $view->verein = $vereinRepository->readById($_GET['id']);
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
          $name = htmlspecialchars($_POST['name']);
          $kategorie = htmlspecialchars($_POST['kategorie']);
          $mitgliederanzahl = $_POST['mitgliederanzahl'];
          $bild = htmlspecialchars($_POST['bild']);
          $gründungsjahr = $_POST['gründungsjahr'];
          $beschreibung = htmlspecialchars($_POST['beschreibung']);

          $error_message = "";
          // validierung
          if(strlen($name) < 2) {
            $error_message .= "Name zu kurz<br><br>";
          }
          if(strlen($name) > 30) {
            $error_message .= "Name zu lang<br><br>";
          }
          if (preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $name))
          {
            $error_message .= "Name darf keine Sonderzeichen enthalten<br><br>";
          }
          if(strlen($kategorie) < 2) {
            $error_message .= "Kategorie zu kurz<br><br>";
          }
          if(strlen($kategorie) > 30) {
            $error_message .= "Kategorie zu lang<br><br>";
          }
          if (preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $kategorie))
          {
            $error_message .= "Kategorie darf keine Sonderzeichen enthalten<br><br>";
          }
          if(!is_numeric($mitgliederanzahl)) {
            $error_message .= "Mitgliederanzahl muss eine Zahl sein<br><br>";
          }
          else {
            if($mitgliederanzahl > 10000000) {
                $error_message .= "Mitgliederanzahl ist zu Gross<br><br>";
            }
          }
          if(!is_numeric($gründungsjahr)) {
            $error_message .= "Gründungsjahr muss eine Zahl sein<br><br>";
          }
          if(strlen($name) > 1000) {
            $error_message .= "Beschreibung zu lang<br><br>";
          }

          if(!empty($error_message)){
              $view = new View("fehler");
              $view->title = "Fehler";
              $view->heading = "Fehler";
              $view->error_message = $error_message;
              $view->display();

          }
          else {
            $vereinRepository = new VereinRepository();
            $newid = $vereinRepository->create($name, $kategorie, $mitgliederanzahl, $bild, $gründungsjahr, $beschreibung);

            header('Location: /verein/detail?id='.$newid);
          }
        }
    }

    public function doUpdate()
    {
      if ($_POST['safe']) {
          $id = htmlspecialchars($_POST['id']);
          $name = htmlspecialchars($_POST['name']);
          $kategorie = htmlspecialchars($_POST['kategorie']);
          $mitgliederanzahl = $_POST['mitgliederanzahl'];
          $bild = htmlspecialchars($_POST['bild']);
          $gründungsjahr = $_POST['gründungsjahr'];
          $beschreibung = htmlspecialchars($_POST['beschreibung']);
          $error_message = "";
          // validierung
          if(strlen($name) < 2) {
            $error_message .= "Name zu kurz<br><br>";
          }
          if(strlen($name) > 30) {
            $error_message .= "Name zu lang<br><br>";
          }
          if (preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $name))
          {
            $error_message .= "Name darf keine Sonderzeichen enthalten<br><br>";
          }
          if(strlen($kategorie) < 2) {
            $error_message .= "Kategorie zu kurz<br><br>";
          }
          if(strlen($kategorie) > 30) {
            $error_message .= "Kategorie zu lang<br><br>";
          }
          if (preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $kategorie))
          {
            $error_message .= "Kategorie darf keine Sonderzeichen enthalten<br><br>";
          }
          if(!is_numeric($mitgliederanzahl)) {
            $error_message .= "Mitgliederanzahl muss eine Zahl sein<br><br>";
          }
          else {
            if($mitgliederanzahl > 10000000) {
                $error_message .= "Mitgliederanzahl ist zu Gross<br><br>";
            }
          }
          if(!is_numeric($gründungsjahr)) {
            $error_message .= "Gründungsjahr muss eine Zahl sein<br><br>";
          }
          if(strlen($name) > 1000) {
            $error_message .= "Beschreibung zu lang<br><br>";
          }

          if(!empty($error_message)){
            $view = new View("fehler");
            $view->title = "Fehler";
            $view->heading = "Fehler";
            $view->error_message = $error_message;
            $view->display();

          }
          else {
            $vereinRepository = new VereinRepository();
            $vereinRepository->update( $id,$name, $kategorie, $mitgliederanzahl, $bild, $gründungsjahr, $beschreibung);

            header('Location: /verein/detail?id='.$id);
          }
        }
    }

    public function delete()
    {
        $vereinRepository = new VereinRepository();
        $vereinRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /verein');
    }
}
