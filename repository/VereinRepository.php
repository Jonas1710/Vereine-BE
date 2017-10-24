<?php

require_once '../lib/Repository.php';

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "verein".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class VereinRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'verein';

    /**
     * Erstellt einen neuen verein mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $name Wert für die Spalte name
     * @param $kategorie Wert für die Spalte kategorie
     * @param $mitgliederanzahl Wert für die Spalte mitgliederanzahl
     * @param $bild Wert für die Spalte bild
     * @param $gründungsjahr Wert für die Spalte gründungsjahr
     * @param $beschreibung Wert für die Spalte beschreibung
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function create($name, $kategorie, $mitgliederanzahl, $bild, $gründungsjahr, $beschreibung)
    {
        $query = "INSERT INTO $this->tableName (name, kategorie, mitgliederanzahl, bild, gründungsjahr, beschreibung) VALUES (?, ?, ?, ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssisis', $name, $kategorie, $mitgliederanzahl, $bild, $gründungsjahr, $beschreibung);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function update( $id, $name, $kategorie, $mitgliederanzahl, $bild, $gründungsjahr, $beschreibung)
    {
        $query = "UPDATE $this->tableName set name=?, kategorie=?, mitgliederanzahl=?, bild=?, gründungsjahr=?, beschreibung=? WHERE id=?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssisisi', $name, $kategorie, $mitgliederanzahl, $bild, $gründungsjahr, $beschreibung, $id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function getByCategory($kategorie)
    {
        $query = "SELECT * FROM {$this->tableName} WHERE kategorie=?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $kategorie);

        // Das Statement absetzen
        $statement->execute();

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
    }
}
