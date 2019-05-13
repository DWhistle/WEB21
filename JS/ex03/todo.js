
var id = 0;

function remove(a) {
    $.ajax({
        url: 'insert.php',
        type: 'POST',
        data: {task: a}

    }).done(function () {
        alert("removed!");
    })
}

$(document).ready(
    function sync() {
        $.ajax({
            url: 'select.php',
            type: 'GET',
            dataType: 'json',

            success: function (result, status) {
                for (let i = 0; result[i]; i++) {
                    let a = result[i];
                    $("#ft_list").prepend("<div onclick=remove(this) id= >" + a + "</div>");
                }
            }
        })
    })

        $("#button").click(input);
function input() {
    let a = prompt("Type a new task", "Nothing");

    $.ajax({
        url: 'insert.php',
        type: 'POST',
        data: {id:id, task:a}
    }).done(function (result) {
        $("#ft_list").prepend("<div onclick=remove(this) id= >"+a+"</div>");
        alert("Success!");
    })
}
$('[id="a$id"]').prop('onclick',null).off('click');

