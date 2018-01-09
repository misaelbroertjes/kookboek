$( document ).ready(function() {
    // Wanneer geklikt word op add bij een ingredient
    $( "#ingredientenAdd" ).click(function() {
        // Haal ingevulde waardes op voor ingredient en hoeveelheid
        ingredientId = $("#ingredientenList").val();
        ingredientNaam = $("#ingredientenList option:selected").text();
        hoeveelheid = $("#hoeveelheid").val();

        // Voeg de gevonden waarde in in het veld
        ingredienten = $("#ingredienten").val();
        ingredienten += ingredientId + ':' + ingredientNaam + ':' + hoeveelheid + ',';
        $("#ingredienten").val(ingredienten);

    });
});