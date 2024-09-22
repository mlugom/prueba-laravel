$("#registrosTable").DataTable({
    data: data,
    columns: [
        { data: 'nombre' },
        { data: 'descripcion' },
        { data: 'display_created_at' },
        { data: 'display_updated_at' },
    ],
});
