var showHint = function(title, text) {
    return function() {
        $('#hint-title').text(title);
        $('#hint-text').text(text);
        $('#hint-modal').modal('show');
    };
};

$('#link-1').click(showHint('Hint 1', 'See the source code!'));
$('#link-2').click(showHint('Hint 2', 'See the cookie!'));
$('#link-3').click(showHint('Hint 3', 'See the header!'));
$('#link-4').click(showHint('Hint 4', 'See the javescript source!'));

var flagPart4 = atob(atob('Wmw5WE16Z2hJU0Y5'));
