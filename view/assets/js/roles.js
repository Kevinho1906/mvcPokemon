// $(document).ready(function () {
//     $('#tableRol').DataTable();
// });

function create() {

    //Información del formulario
    var data = `txtRol=${document.getElementById("txtRol").value}`;

    //Configuracion de la petición 
    var options = {
        method: "POST",
        body: data,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        }
    };

    fetch("../controller/roles.create.php", options)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            read();
            document.getElementById("txtRol").value = ''
        })
        .catch((error) => {
            console.log("Error al crear el Rol...")
        });
}

function read() {

    fetch("../controller/roles.read.php")
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            let table = '';
            data.forEach((element, index) => {
                table += `<tr>`
                table += `  <th scope='row'>${index + 1}</th>`
                table += `  <td>${element.nombreRol}</td>`
                table += `  <td>
                                <div class="form-check form-switch">
                                    <input onclick="statusRol('${element.id}','${element.estado}')" class="form-check-input" type="checkbox" id="switch${element.nombreRol}" ${element.estado == "A"? "checked":""}>
                                    <label class="form-check-label" for="switch${element.nombreRol}">${element.estado == 'A'?'Activo':'Inactivo'}</label>
                                </div>
                            </td>`
                table += `  <td>${element.fechaCreacion}</td>`
                table += `  <td>
                                <button class="btn btn-warning" tittle="Editar" type="button" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="readId(${element.id})"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger" tittle="Eliminar"><i class="fa fa-trash"></i></button>
                            </td>`
                table += `</tr>`
            });
            document.getElementById('tableRol').innerHTML = table;
            localStorage.id = data[0].id;
        })
        .catch((error) => {
            console.log("Error al Consultar Rol... | ¡REVISE!" + error)
        });

}

function update() {

    let nombreRol = document.getElementById("txtRolM").value;
    let id = localStorage.id;

    let data = `nombreRol=${nombreRol}&id=${id}`;

    const options = {

        method: 'POST',
        body: data,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
    };

    fetch('../controller/roles.update.php', options)
        .then((response) => response.json())
        .then((data) => {

            console.log(data);
            read();

        })
}

function deletes() {

}

function readId(id) {
    console.log(id);
    var data = `id=${id}`;

    //Configuracion de la peticion
    var options = {
        method: "POST",
        body: data,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        }
    };

    fetch('../controller/roles.readOne.php', options)
        .then((response) => response.json())
        .then((data) => {
            console.log(data)
            document.getElementById("txtRolM").value = data[0].nombreRol;
        })
        .catch((error) => {
            console.log("Error al obtener los roles!!" + error)
        })
}

function statusRol(id, estado) {

    let data = `id=${id}&estado=${estado}`;

    let optinos = {
        
        method: 'POST',
        body: data,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
    };

    fetch("../controller/roles.estado.php", optinos)
        .then((response) => response.json)
        .then((data) => {
            console.log(data);
            read()
        });
    
}

//Función para que cuando el estado este aactivo, no se desabilite el cecked

// function actualizarEstado() {

//     let dato = document
//         .getElementById("tableRol")
//         .getElementsByClassName("form-chechk-input");

//     let label = document
//         .getElementById("tableRol")
//         .getElementsByClassName("form-chechk-label");

    
//     for (let i = 0; i < dato.length; i++) {
//         if (label[i].innerHTML == "Activo") {
//         dato[i].setAttribute("checked", "");
//         }        
//     }

// }

window.onload = (event) => {

    read();

}