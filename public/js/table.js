var table = $("#registrosTable").DataTable({
    ajax: {
        url: jsonUrl,
        dataSrc: 'data',
    },
    columns: [
        { data: 'nombre' },
        { data: 'descripcion' },
        { data: 'display_created_at' },
        { data: 'display_updated_at' },
        {
            data: 'id',
            render: (id) => {
                return generateActions(id);
            },
        },
    ],
});


function generateActions(id) {
    const editButton = generateEditButton(id);
    const deleteButton = generateDeleteButton(id);
    const div = document.createElement("div");
    div.className = "d-flex justify-content-center gap-2";
    div.appendChild(editButton);
    div.appendChild(deleteButton);
    return div;
}

function generateEditButton(id) {
    const editButton = document.createElement("button");
    editButton.className = "btn btn-primary";
    editButton.addEventListener("click", () => { goToEdit(id) });
    editButton.innerHTML = "Editar";
    return editButton;
}

function showAlert(id) {
    const div = document.createElement("div");
    div.id = "alert-container";
    div.className = "fixed-top w-100 h-100 z-2 d-flex justify-content-center align-items-center";
    div.style.backgroundColor = "rgba(255, 255, 255, 0.7)";

    const card = `
        <div class="card w-75">
            <div class="card-header">
                Aviso
            </div>
            <div class="card-body d-flex flex-column align-items-center gap-5 p-3">
                <h3>¿Seguro que desea eliminar el registro? Esta acción no se puede deshacer</h3>
                <div class="d-flex justify-content-center gap-3">
                    <button class="btn btn-primary" onclick="dismissAlert()">Cancelar</button>
                    <button class="btn btn-danger" onclick="executeDelete(${id})">Confirmar</button>
                </div>
            </div>
        </div>
    `;

    div.innerHTML = card;

    document.body.appendChild(div);
}

function dismissAlert() {
    const alertContainer = document.querySelector("#alert-container");
    alertContainer.remove();
}

function executeDelete(id) {
    $.ajax({
        url: getDeleteUrl(id),
        data: {
            _token: csrfToken,
        },
        method: "delete",
        success: (result) => {
            dismissAlert();
            if (result.message) {
                console.log(result);
                displayMessage(result.message);
            }
            table.ajax.reload();
        },
        error: (error) => {
            console.log("There was an error");
            console.log(error);
        },
    });
}

function generateDeleteButton(id) {
    const deleteButton = document.createElement("button");
    deleteButton.className = "btn btn-danger";
    deleteButton.addEventListener("click", () => { showAlert(id) });
    deleteButton.innerHTML = "Eliminar";
    return deleteButton;
}


