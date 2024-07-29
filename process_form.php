<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reisezeitraum = $_POST['reisezeitraum'];
    $anzahl_erwachsene = $_POST['anzahl_erwachsene'];
    $kinder = [];
    
    if (isset($_POST['kind_name'])) {
        for ($i = 0; $i < count($_POST['kind_name']); $i++) {
            $kinder[] = [
                'name' => $_POST['kind_name'][$i],
                'geburtstag' => $_POST['kind_geburtstag_tag'][$i] . '-' . $_POST['kind_geburtstag_monat'][$i] . '-' . $_POST['kind_geburtstag_jahr'][$i]
            ];
        }
    }

    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $geschlecht = $_POST['geschlecht'];
    $email = $_POST['email'];
    $land = $_POST['land'];
    $plz = $_POST['plz'];
    $stadt = $_POST['stadt'];
    $strasse = $_POST['strasse'];
    $telefon = $_POST['telefon'];
    $wuensche = $_POST['wünsche'];

    // Process form data, e.g., save to database, send email, etc.
    // For demonstration, let's just output the data
    echo "<h1>Form Data</h1>";
    echo "<strong>Reisezeitraum:</strong> $reisezeitraum<br>";
    echo "<strong>Anzahl Erwachsene:</strong> $anzahl_erwachsene<br>";
    echo "<strong>Kinder:</strong><br>";
    foreach ($kinder as $kind) {
        echo "- Name: " . $kind['name'] . ", Geburtstag: " . $kind['geburtstag'] . "<br>";
    }
    echo "<strong>Vorname:</strong> $vorname<br>";
    echo "<strong>Nachname:</strong> $nachname<br>";
    echo "<strong>Geschlecht:</strong> $geschlecht<br>";
    echo "<strong>E-Mail:</strong> $email<br>";
    echo "<strong>Land:</strong> $land<br>";
    echo "<strong>PLZ:</strong> $plz<br>";
    echo "<strong>Stadt:</strong> $stadt<br>";
    echo "<strong>Straße:</strong> $strasse<br>";
    echo "<strong>Telefon:</strong> $telefon<br>";
    echo "<strong>Fragen oder Wünsche:</strong> $wuensche<br>";
}
?>
