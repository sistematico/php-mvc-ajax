$(function() {

    const listBtn = document.getElementById("list");
    const addBtn = document.getElementById("add");
    const editBtn = document.getElementById("edit");
    const deleteBtn = document.getElementById("delete");
    const results = document.getElementById("results");
    let saida = '';
    
    let list = (action, div) => {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                div.innerHTML = '';
                let objetos = JSON.parse(xmlhttp.responseText);
                for(let i in objetos) {
                    saida += '<tr>';
                    saida += '<th scope="row">' + objetos[i].id + '</th>';
                    saida += '<td>' + objetos[i].quote + '</td>';
                    saida += '<td>' + objetos[i].author + '</td>';
                    saida += '<td>' + objetos[i].tags + '</td>';
                    saida += '<td>' + objetos[i].date + '</td>';
                    saida += '<td>' + objetos[i].id + '</td>';
                    saida += '<td><a id="delete" href="' + url + 'delete/' + objetos[i].id + '">del</a></td>';
                    saida += '<td><a id="edit" href="' + url + 'edit/' + objetos[i].id + '">edit</a></td>';
                    saida += '</tr>';
                }
                div.innerHTML = saida;
            }
        }
        xmlhttp.open("GET", action, true);
        xmlhttp.send();
    };
    
    listBtn.onclick = function(){
        list(url + 'quotes/ajaxlist', results);
    }; 

    addBtn.onclick = function(){
        add(url + 'quotes/add', results);
    }; 

    editBtn.onclick = function(){
        edit(url + 'quotes/edit', results);
    }; 

    deleteBtn.onclick = function(){
        delete(url + 'quotes/ajaxlist', results);
    }; 
    
    list(url + 'quotes/ajaxlist', results);

});
