$( document ).ready(function() {
    $( "#keywords" ).keyup(function() {
        // vervang dubbel spatie door komma
        keywords = $( "#keywords" ).val();
        keywords = keywords.replace(/  /g, ', ');
        $( "#keywords" ).val(keywords);
    });
});