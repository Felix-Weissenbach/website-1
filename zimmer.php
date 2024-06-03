<div id="reservation">
    <div class="standard-container">
      <div class="reservation-content">
        <h2><span class="text-highlighted">Zimmer Buchung</span></h2>
      <form action="#" method="post">
        <label for="aDate">Anreisedatum:</label>
        <input type="date" id="aDate" name="aDate" required><br><br>

        <label for="dDate">Abreisedatum:</label>
        <input type="date" id="dDate" name="dDate" required><br><br>

        <label for="breakfast">mit Frühstuck:</label>
        <input type="checkbox" id="breakfast" name="breakfast"><br><br>

        <label for="parking">mit Parkplatz:</label>
        <input type="checkbox" id="parking" name="parking"><br><br>

        <label for="pets">Mitnahme von Haustieren:</label>
        <input type="checkbox" id="pets" name="pets"><br><br>
        <input type="submit" id="btn" value="Jetzt Reservierung bestätigen">
      </form>
      </div>
    </div>
  </div>

  <script>
    const form = document.getElementById('reservationForm');

    form.addEventListener('submit', function(event) {
      const aDate = new Date(document.getElementById('aDate').value);
      const dDate = new Date(document.getElementById('dDate').value);

      if (aDate >= dDate) {
        alert('Abreisedatum muss größer als Anreisedatum sein');
        event.preventDefault();
      }
    });
  </script>