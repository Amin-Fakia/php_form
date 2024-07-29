<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urlaubsdaten Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <form id="urlaubsdatenForm" action="process_form.php" method="POST" novalidate>
            <h2>Ihre Urlaubsdaten</h2>
            <div class="form-group">
                <label for="reisezeitraum">Reisezeitraum *</label>
                <input type="text" id="reisezeitraum" name="reisezeitraum" required>
                <span class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="anzahl_erwachsene">Anzahl Erwachsene *</label>
                <input type="number" id="anzahl_erwachsene" name="anzahl_erwachsene" required>
                <span class="error-message"></span>
            </div>

            <h2>Kinder</h2>
            <div id="kinder-container">
                <div class="kind form-group">
                    <label for="kind_name_1">Name des Kindes *</label>
                    <input type="text" id="kind_name_1" name="kind_name[]" required>
                    <span class="error-message"></span>
                    <label>Geburtstag *</label>
                    <div class="birthdate-selects">
                        <select name="kind_geburtstag_tag[]" required>
                            <?php for ($i = 1; $i <= 31; $i++): ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                        <select name="kind_geburtstag_monat[]" required>
                            <?php for ($i = 1; $i <= 12; $i++): ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                        <select name="kind_geburtstag_jahr[]" required>
                            <?php for ($i = date("Y"); $i >= 1900; $i--): ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                        <span class="error-message"></span>
                    </div>
                </div>
            </div>
            <button type="button" class="add-child-btn" onclick="addChild()">KIND HINZUFÜGEN</button>

            <h2>Ihre Kontaktdaten</h2>
            <div class="form-group">
                <label for="vorname">Vorname *</label>
                <input type="text" id="vorname" name="vorname" required>
                <span class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="nachname">Nachname *</label>
                <input type="text" id="nachname" name="nachname" required>
                <span class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="geschlecht">Geschlecht *</label>
                <select id="geschlecht" name="geschlecht" required>
                    <option value="">Auswählen</option>
                    <option value="male">Männlich</option>
                    <option value="female">Weiblich</option>
                    <option value="other">Andere</option>
                </select>
                <span class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="email">E-Mail *</label>
                <input type="email" id="email" name="email" required>
                <span class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="land">Land *</label>
                <select id="land" name="land" required>
                    <option value="Austria">Österreich</option>
                    <option value="Germany">Deutschland</option>
                    <!-- Add country options here -->
                </select>
                <span class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="plz">PLZ *</label>
                <input type="text" id="plz" name="plz" required>
                <span class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="stadt">Stadt *</label>
                <input type="text" id="stadt" name="stadt" required>
                <span class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="strasse">Straße *</label>
                <input type="text" id="strasse" name="strasse" required>
                <span class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="telefon">Telefon</label>
                <input type="tel" id="telefon" name="telefon">
                <span class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="wünsche">Fragen oder Wünsche</label>
                <textarea id="wünsche" name="wünsche"></textarea>
            </div>
            
            <button type="submit" class="submit-btn">ANFRAGE ABSENDEN</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="scripts.js"></script>
</body>
</html>
