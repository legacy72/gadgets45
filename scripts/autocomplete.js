$(document).ready(function() {
    // или массив объектов
    availableTags = [
        { label: "abc", value: "https://ya.ru" },
        { label: "gasreweq", value: "https://google.com" },
        { label: "abcdefg", value: "https://ya.com" },
        { label: "qwe", value: "https://lol.com" },
        { label: "aaavb", value: "https://yandex.ru" }
    ];

    // задаем массив в качестве источника слов для автозаполнения.
    $("#search_input").autocomplete({
        source: availableTags,
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