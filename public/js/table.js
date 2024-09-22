$("#registrosTable").DataTable({
    ajax: "/registros-json",
    columns: [
        { data: 'name' },
        { data: 'description' },
        { data: 'created_at' },
        { data: 'updated_at' },
    ],
});
