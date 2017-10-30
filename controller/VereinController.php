<?php

require_once '../repository/VereinRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class VereinController
{
    //Get: Liste aller Vereine
    public function index()
    {
        $vereinRepository = new VereinRepository();

        $view = new View('verein_index');
        $view->title = 'Vereine';
        $view->heading = 'Vereine';
        $view->vereine = $vereinRepository->readAll();
        $view->display();
    }

    //Get: Liste von Vereinen die zum Suchbegriff passen
    //@param Get $searchTerm Suchbegriff
    public function search()
    {
      $vereinRepository = new VereinRepository();
      $searchTerm = $_GET['searchTerm'];
      $view = new View('verein_index');
      $view->heading = 'Suchbegriff: '. $searchTerm;
      $view->title = 'Vereine';
      $view->vereine = $vereinRepository->search($searchTerm);

      $view->display();
    }


    //Get: Liste von Vereinen mit einer bestimmten Kategorie
    //@param Get $kategorie bestimmte Kategorie
    public function category()
    {
      $vereinRepository = new VereinRepository();

      $view = new View('verein_index');
      $view->kategorie = $_GET['kategorie'];
      $view->title = 'Kategorie';
      $view->heading = 'Kategorie: '. $_GET['kategorie'];
      $view->vereine = $vereinRepository->getByCategory($view->kategorie);
      $view->display();
    }

    //Get: Detail ansicht eines Vereins mit einer bestimmten id
    //@param get $id bestimmte id
    public function detail()
    {
        $vereinRepository = new VereinRepository();

        $view = new View('verein_detail');
        $view->heading = "";
        $view->verein = $vereinRepository->readById($_GET['id']);
        $view->title = $view->verein->name;
        $view->display();
    }


    //Get: Update Formular eines Vereins mit einer bestimmten id und dessen Eigenschaften
    //@param get $id bestimmte id
    public function update ()
    {
        $vereinRepository = new VereinRepository();

        $view = new View('verein_update');
        $view->title = "Verein";
        $view->heading = "Verein bearbeiten";
        $view->verein = $vereinRepository->readById($_GET['id']);
        $view->display();
    }

    //Get: Create Formular eines Vereins
    public function create()
    {
        $view = new View('verein_create');
        $view->title = 'Verein erfassen';
        $view->heading = 'Verein erfassen';
        $view->display();
    }


    //Post: Lädt und validiert das Formular in die Datenbank
    public function doCreate()
    {
      if ($_POST['submit']) {
          $name = htmlspecialchars($_POST['name']);
          $kategorie = htmlspecialchars($_POST['kategorie']);
          $mitgliederanzahl = $_POST['mitgliederanzahl'];
          $gründungsjahr = $_POST['gründungsjahr'];
          $beschreibung = htmlspecialchars($_POST['beschreibung']);


          
          $target_dir = "uploads/";
          $target_file = $target_dir . basename($_FILES["img"]["name"]);
          $uploadOk = 1;
          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
          // Check if image file is a actual image or fake image
          if(isset($_POST["submit"])) {
              $check = getimagesize($_FILES["img"]["tmp_name"]);
              if($check !== false) {
                  echo "File is an image - " . $check["mime"] . ".";
                  $uploadOk = 1;
              } else {
                  echo "File is not an image.";
                  $uploadOk = 0;
              }
          }
          // Check if file already exists
          if (file_exists($target_file)) {
              echo "Sorry, file already exists.";
              $uploadOk = 0;
          }
          // Check file size
          if ($_FILES["img"]["size"] > 500000) {
              echo "Sorry, your file is too large.";
              $uploadOk = 0;
          }
          // Allow certain file formats
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" ) {
              echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              $uploadOk = 0;
          }
          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
              echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
          } else {
              if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                  echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
              } else {
                  echo "Sorry, there was an error uploading your file.";
              }
          }

          $error_message = "";
          // validierung
          if(strlen($name) < 2) {
            $error_message .= "Name zu kurz<br><br>";
          }
          if(strlen($name) > 30) {
            $error_message .= "Name zu lang<br><br>";
          }
          if (preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬]/", $name))
          {
            $error_message .= "Name darf keine Sonderzeichen enthalten<br><br>";
          }
          if(strlen($kategorie) < 2) {
            $error_message .= "Kategorie zu kurz<br><br>";
          }
          if(strlen($kategorie) > 30) {
            $error_message .= "Kategorie zu lang<br><br>";
          }
          if (preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬]/", $kategorie))
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
            $newid = $vereinRepository->create($name, $kategorie, $mitgliederanzahl, $gründungsjahr, $beschreibung, $target_file);
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
          $gründungsjahr = $_POST['gründungsjahr'];
          $beschreibung = htmlspecialchars($_POST['beschreibung']);
          $error_message = "";


          $target_dir = "uploads/";
          $target_file = $target_dir . basename($_FILES["img"]["name"]);
          $uploadOk = 1;
          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
          // Check if image file is a actual image or fake image
          if(isset($_POST["submit"])) {
              $check = getimagesize($_FILES["img"]["tmp_name"]);
              if($check !== false) {
                  echo "File is an image - " . $check["mime"] . ".";
                  $uploadOk = 1;
              } else {
                  echo "File is not an image.";
                  $uploadOk = 0;
              }
          }
          // Check if file already exists
          if (file_exists($target_file)) {
              echo "Sorry, file already exists.";
              $uploadOk = 0;
          }
          // Check file size
          if ($_FILES["img"]["size"] > 500000) {
              echo "Sorry, your file is too large.";
              $uploadOk = 0;
          }
          // Allow certain file formats
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" ) {
              echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              $uploadOk = 0;
          }
          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
              echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
          } else {
              if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                  echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
              } else {
                  echo "Sorry, there was an error uploading your file.";
              }
          }

          // validierung
          if(!isset($name)) {
            $error_message .= "Name Muss eingegeben werden<br><br>";
          }
          else {
            if(strlen($name) < 2) {
              $error_message .= "Name zu kurz<br><br>";
            }
            if(strlen($name) > 30) {
              $error_message .= "Name zu lang<br><br>";
            }
            if (preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬]/", $name))
            {
              $error_message .= "Name darf keine Sonderzeichen enthalten<br><br>";
            }
          }
          if(!isset($kategorie)) {
            $error_message .= "Kategorie Muss eingegeben werden<br><br>";
          }
          else {
            if(strlen($kategorie) < 2) {
              $error_message .= "Kategorie zu kurz<br><br>";
            }
            if(strlen($kategorie) > 30) {
              $error_message .= "Kategorie zu lang<br><br>";
            }
          }
          if (preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬]/", $kategorie))
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
          else {
            if($gründungsjahr < 0) {
              $error_message .= "Gründungsjahr darf nicht negativ sein";
            }
            if($gründungsjahr > 9999) {
              $error_message .= "Gründungsjahr ist zu hoch";
            }
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
            $vereinRepository->update( $id,$name, $kategorie, $mitgliederanzahl, $gründungsjahr, $beschreibung, $target_file);

            header('Location: /verein/detail?id='.$id);
          }
        }
    }

    public function delete()
    {
        $vereinRepository = new VereinRepository();
        $vereinRepository->deleteById($_GET['id']);

        // Anfrage an die URI /verein weiterleiten (HTTP 302)
        header('Location: /verein');
    }
}
