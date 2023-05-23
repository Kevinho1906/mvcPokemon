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
                                <button class="btn btn-danger" tittle="Eliminar" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteId(${element.id},'${element.nombreRol}')"><i class="fa fa-trash"></i></button>
                            </td>`
                table += `</tr>`
            });
            document.getElementById('tableRol').innerHTML = table;
            let tables = new DataTable('#rolesT',{
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
                },
                dom: "Bfrtip",
                buttons: [
                    {
                        extend: 'copy',
                        text: '<i class="fa fa-regular fa-copy"></i>',
                        tittleAttr: 'Copiar',
                        exportOptions: {
                            columns: [0,1,2,3]
                        },
                        className: 'copyDataTable',
                    }, 
                    {
                        extend: 'excel',
                        text: '<i class="bi bi-file-earmark-excel"></i>',
                        tittleAttr: 'EXCEL',
                        exportOptions: {
                            columns: [0,1,2,3]
                        },
                        className: 'excelDataTable'
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="bi bi-file-earmark-pdf"></i>',
                        tittleAttr: 'PDF',
                        exportOptions: {
                            columns: [0,1,2,3]
                        },
                        className: 'pdfDataTable',
                        download: 'open'
                    }, 
                    {
                        extend: 'print',
                        text: '<i class="bi bi-printer"></i>',
                        tittleAttr: 'print',
                        exportOptions: {
                            columns: [0,1,2,3]
                        },
                        className: 'printDataTable'
                    },
                ]
            });
            // cargarDataTable($("#rolesT"),"ROLES",4);
            localStorage.id = data[0].id;
        })
        .catch((error) => {
            console.log("Error al Consultar Rol... | ¡REVISE!" + error)
        });

}

function Update() {

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

function deleteId(id, nombreRol) {
    document.getElementById("mensajeEliminar").innerHTML = `¿Está Seguro De Eliminar el Rol? "${nombreRol}"`
    // let nombreRol = document.getElementById("txtRolMEliminar").value;
    // let id = localStorage.id;
    localStorage.id = id;
}

function Delete() {
    let id = localStorage.id;

    let data = `id=${id}`;

    const options = {

        method: 'POST',
        body: data,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
    };

    fetch('../controller/roles.delete.php', options)
        .then((response) => response.json())
        .then((data) => {

            console.log(data);
            read();
        })
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