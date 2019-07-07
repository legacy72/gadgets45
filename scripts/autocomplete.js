$(document).ready(function() {
    var autocompleteItems = [];
    $.ajax({
        type: "POST",
        url: "/templates/autocomplete_items.php",
        async: false,
        success: function(data) {
            autocompleteItems = JSON.parse(data);
            console.log(autocompleteItems);
        }
    });

    $("#search_input").autocomplete({
        source: autocompleteItems,
        minLength: 1,
        messages: {
            noResults: '',
            results: function() {}
        },
        select: function(event, ui) {
            window.location.href = ui.item.value;
        },
        focus: function(event, ui) {
            event.preventDefault();
        },
        close: function(event, ui) {
            $("#search_input").val('');
        }
    });
});