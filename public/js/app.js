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
            let result = '', num = 0;
            data = $.parseJSON(data);       
            result += '<div id="results" class="card-deck">';
            $.each(data, function(key, item) {
                num++;
                result += '<div class="card text-white bg-dark mb-3">';
                result += '<div class="card-body">';
                result += '<blockquote class="blockquote">';
                result += '<p>' + item.quote + '</p>';
                result += '<footer class="blockquote-footer">' + item.author + '</footer>';
                result += '</blockquote>';
                result += '</div>';
                result += '<div class="card-footer text-muted">';
                result += '<a href="javaScript:void(0)" onclick="editData(' + item.id + ');" class="card-link btn btn-sm btn-warning">Edit</a>';
                result += '<a href="javaScript:void(0)" onclick="deleteData(' + item.id + ');" class="card-link btn btn-sm btn-danger">Delete</a>';
                result += '</div>';
                result += '</div>';
                if (num > 2) {
                    num = 0;
                    result += '</div><div class="card-deck">';
                } 
            });
            result += '</div>';        
  
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
        let result = '', num = 0;
        
        result += '<div id="results" class="card-deck">';
        $.each(data, function(key, item) {
            num++;
            result += '<div class="card text-white bg-dark mb-3">';
            result += '<div class="card-body">';
            result += '<blockquote class="blockquote">';
            result += '<p>' + item.quote + '</p>';
            result += '<footer class="blockquote-footer">' + item.author + '</footer>';
            result += '</blockquote>';
            result += '</div>';
            result += '<div class="card-footer text-muted">';
            result += '<a href="javaScript:void(0)" onclick="editData(' + item.id + ');" class="card-link btn btn-sm btn-warning">Edit</a>';
            result += '<a href="javaScript:void(0)" onclick="deleteData(' + item.id + ');" class="card-link btn btn-sm btn-danger">Delete</a>';
            result += '</div>';
            result += '</div>';
            if (num > 2) {
                num = 0;
                result += '</div><div class="card-deck">';
            } 
        });
        result += '</div>';        
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