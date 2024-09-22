$("#registrosTable").DataTable({
    data: data,
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

function generateDeleteButton(id) {
    const deleteButton = document.createElement("button");
    deleteButton.className = "btn btn-danger";
    deleteButton.addEventListener("click", () => { showAlert(id) });
    deleteButton.innerHTML = "Eliminar";
    return deleteButton;
}
