$(document).ready(function() {
    list();
});

$("form#searchform").on("submit",function (e) {
    e.preventDefault();
    var term = $("#term").val();
    if (term == "") {
        alert("Please enter the term");
        $("#term").focus();
    } else {
        $.post(url + "quotes/search",{term:term}, function (data) {
            let result = '';
            data = $.parseJSON(data);
            $.each(data, function(key, item) {
                result += '<tr><td>' + item.id + '</td>';
                result += '<td>' + item.quote + '</td>';
                result += '<td>' + item.author + '</td>';
                result += '<td>' + item.tags + '</td>';
                result += '<td>' + item.date + '</td>';
                result += '<td><a href="javaScript:void(0)" onclick="editData(' + item.id + ');" class="btn btn-success btn-sm">Edit <i class="fa fa-pencil-square-o"></i></a></td>';
                result += '<td><a href="javaScript:void(0)" onclick="deleteData(' + item.id + ');" class="btn btn-danger btn-sm">';
                result += 'Delete<i class="fa fa-trash-o"></i></a></td>';
                result += '</tr>';
            });
            $('#results').html(result);
        });
    }
});

$("form#addform").on("submit",function (e) {
    e.preventDefault();
    var quote = $("#quote").val();
    var author = $("#author").val();
    var tags = $("#tags").val();
    var id = $("#id").val();
    if (quote == "") {
        alert("Please enter quote");
        $("#quote").focus();
    } else if (author == "") {
        alert("Please enter author");
        $("#author").focus();
    } else if (tags == "") {
        alert("Please enter tags");
        $("#tags").focus();
    } else {
        $("#buttonLabel").html("Saving...");
        $("#spinnerLoader").show('fast');
        $.post(url + "quotes/add",{
            quote:quote,
            author:author,
            tags:tags,
            id:id,
        }, function (response) {
            if (response == "Quote added") {
                $("#buttonLabel").html("Save");
                $("#spinnerLoader").hide('fast');
                $("#addModal").modal('hide');
                $("form#addform").each(function () {
                    this.reset();
                });
                list();
            }
            $("#result").html(response).fadeIn(2000, function() { 
                $(this).delay(5000).fadeOut(2000);
            });
        });
    }
});

$("form#editform").on("submit",function (e) {
    e.preventDefault();
    var quote = $("#editquote").val();
    var author = $("#editauthor").val();
    var tags = $("#edittags").val();
    var id = $("#editid").val();
    if (quote == "") {
        alert("Please enter quote");
        $("#quote").focus();
    } else if (author == "") {
        alert("Please enter author");
        $("#author").focus();
    } else if (tags == "") {
        alert("Please enter tags");
        $("#tags").focus();
    } else {
        $("#buttonLabel").html("Saving...");
        $("#spinnerLoader").show('fast');
        $.post(url + "quotes/update",{
            quote:quote,
            author:author,
            tags:tags,
            id:id,
        }, function (response) {
            if (response == "Quote edited") {
                $("#buttonLabel").html("Save");
                $("#spinnerLoader").hide('fast');
                $("#editModal").modal('hide');
                $("form#editform").each(function () {
                    this.reset();
                });
                list();
            }
            $("#result").html(response).fadeIn(2000, function() { 
                $(this).delay(5000).fadeOut(2000);
            });
        });
    }
});

function list() {
    $.getJSON(url + "quotes/list", function(data) {
        let result = '';

        $.each(data, function(key, item) {
            result += '<tr><td>' + item.id + '</td>';
            result += '<td>' + item.quote + '</td>';
            result += '<td>' + item.author + '</td>';
            result += '<td>' + item.tags + '</td>';
            result += '<td>' + item.date + '</td>';
            result += '<td><a href="javaScript:void(0)" onclick="editData(' + item.id + ');" class="btn btn-success btn-sm">Edit <i class="fa fa-pencil-square-o"></i></a></td>';
            result += '<td><a href="javaScript:void(0)" onclick="deleteData(' + item.id + ');" class="btn btn-danger btn-sm">';
            result += 'Delete<i class="fa fa-trash-o"></i></a></td>';
            result += '</tr>';
        });

        $('#results').html(result);
    });

    $.get(url + "quotes/amount", function (response) {
        $('#amount').html('Quotes: ' + response);
    });
}

function editData(id) {
    $.getJSON(url + "quotes/edit/" + id, function(data) {    
        $("#editid").val(data.id);
        $("#editquote").val(data.quote);
        $("#editauthor").val(data.author);
        $("#edittags").val(data.tags);
        $("#editModal").modal('show');
    });
}

function deleteData(id) {
    if (confirm("Are you sure to delete this ?")) {
        $('#deleteSpinner' + id).show('fast');
        $.get(url + "quotes/delete/" + id, function (response) {
            if (response == "Quote deleted") {
                $('#deleteSpinner' + id).hide('fast');
                list();
            }
        });
    }
}

function populate() {
    $.get(url + "quotes/populate", function (response) {
        $("#result").html(response).fadeIn(2000, function() { 
            $(this).delay(5000).fadeOut(2000);
        });
        list();
    });
}

function prune() {
    $.get(url + "quotes/prune", function (response) {
        $("#result").html(response).fadeIn(2000, function() { 
            $(this).delay(5000).fadeOut(2000);
        });
        list();
    });
}