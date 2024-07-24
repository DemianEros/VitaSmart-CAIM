showLoader()
let modalBootstrap;
let modalDelete = document.getElementById('confirmDeleteModal');
let modalEdit = document.getElementById('editModal');
let modalCreate = document.getElementById('createModal');
let table = new DataTable('#table-positions', {
    info: true,
    order: [[0, 'desc']],
    autoWidth: true,
    language: {
        url: './js/language/spanish.json',
    },
    ajax: {
        url: 'cargos/data-Table-list',
    },
    columns: [
        { data: "id", title: 'ID' },
        { data: "name", title: 'Nombre' },
        { data: "created_at", title: 'Fecha' },
        { data: "deleted_at", title: 'Estatus' },
        { data: null, title: 'Acciones', orderable: false, searchable: false }
    ],
    columnDefs: [
        {
            targets: 2, 
            render: function(data, type, row) {
                const date = new Date(data);
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                return year/month/day;
            }
        },
        {
            targets: 3,
            render: function(data, type, row) {
                let statusClass = '';
                let statusText = '';
                
                if (data) { 
                    statusClass = 'text-danger'; 
                    statusText = 'Inactivo';
                } else { 
                    statusClass = 'text-success'; 
                    statusText = 'Activo';
                }

                return <span class='${statusClass}'>${statusText}</span>;
            }
        },
        {
            targets: -1, 
            render: function(data, type, row) {
                return `
                    <button class='btn btn-sm btn-primary btn-edit me-2' onclick='openEditModal(this)' role='button'><i class='ti ti-edit'></i></button>
                    <button class='btn btn-sm btn-primary btn-delete' onclick='openDeleteModal(this)' role='button'><i class='ti ti-repeat'></i></button>

                `;
            }
        }
    ],
    dom: 'Bfrtip',
    buttons: [
        {
            text: '<i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Agregar cargo</span>',
            className: 'create-new btn btn-primary waves-effect waves-light',
            action: function (e, dt, node, config) {
                modalBootstrap = new bootstrap.Modal(modalCreate, {
                    backdrop: 'static',
                    keyboard: false});
                modalBootstrap.show();                   
            }
        }
    ],
    initComplete: function () { 
        hideLoader()
    }
});

const submitCreateForm = (evt) => {
    evt.preventDefault();
    evt.stopPropagation();
    document.getElementById('btnSubmit').disabled = true;
    const form = document.querySelectorAll('.needs-validation');
    form[0].classList.add('was-validated');
    if (form[0].checkValidity()) {
        showLoader();
        let data = getItemsObject(form[0].elements);
        data._token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        sendRequestAjax('/cargos', 'POST', data,
            responseData => {
                hideLoader();
                showAlert({
                    icon: 'success',
                    title: 'Registro correcto',
                    html: responseData.html,
                    cancelButton: responseData.cancelButton
                }, (result) => {
                    form[0].reset();
                    form[0].classList.remove('was-validated');
                    document.getElementById('btnSubmit').disabled = false;
                    modalBootstrap.hide();
                    table.ajax.reload();
                });
            },
            error => {
                hideLoader();
                showAlert({
                    icon: 'error',
                    title: 'Hubo un problema al registrarlo',
                    html: error.responseText,
                    cancelButton: false
                });
            }
        );
    } else {
        document.getElementById('btnSubmit').disabled = false;
    }
};

function openEditModal(object) {
    let data = table.row($(object).parents('tr')).data();
    document.getElementById('editPosition').value = data.name;
    document.getElementById('id').value = data.id; 
    let modalEdit = document.getElementById('editModal');
    modalBootstrap = new bootstrap.Modal(modalEdit, {
        backdrop: 'static',
        keyboard: false 
    });
    modalBootstrap.show();
}

const submitEditForm = (evt) => {
    evt.preventDefault();
    evt.stopPropagation();
    document.getElementById('btnSubmit').disabled = true;
    const form = document.querySelectorAll('.edit-needs-validation');
    form[0].classList.add('was-validated');
    if (form[0].checkValidity()) {
        showLoader();
        let data = getItemsObject(form[0].elements);
        data._token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        sendRequestAjax(/cargos/data.id, 'PUT', data, 
            (responseData) => {
                hideLoader();
                showAlert({
                    icon: 'success',
                    title: 'Registro actualizado',
                    html: responseData.html,
                    cancelButton: responseData.cancelButton
                }, (result) => {
                    if (modalBootstrap) {
                        modalBootstrap.hide();
                    }
                    table.ajax.reload();
                });
            },
            (error) => {
                hideLoader();
                showAlert({
                    icon: 'error',
                    title: 'Hubo un problema para actualizar el registro',
                    html: error.responseText,
                    cancelButton: false
                });
            }
        );
    } else {
        document.getElementById('btnSubmit').disabled = false;
    }
};


function openDeleteModal(button) {
    let row = $(button).closest('tr');
    let data = table.row(row).data(); 
    let id = data.id; 
    document.getElementById('table-positions').value = id; 
    let modalDelete = document.getElementById('confirmDeleteModal');
    let modalBootstrap = new bootstrap.Modal(modalDelete, {
        backdrop: 'static',
        keyboard: false
    });
    modalBootstrap.show();
}


function confirmStatusChange() {
    const positionId = document.getElementById("table-positions").value;
    console.log("Enviando ID:", positionId); 
    showLoader();
    $.ajax({
        url: /cargos/positionId/status, 
        type: 'PUT',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            hideLoader(); 
            let modalDelete = document.getElementById('confirmDeleteModal');
            let modalBootstrap = bootstrap.Modal.getInstance(modalDelete);
            modalBootstrap.hide();
            table.ajax.reload();
            showAlert({
                icon: 'success',
                title: 'Estatus cambiado',
                html: 'El estatus del registro se ha cambiado correctamente.',
                cancelButton: false
            });
        },
        error: function(xhr) {
            hideLoader(); 
            showAlert({
                icon: 'error',
                title: 'Hubo un problema para cambiar el estatus',
                html: xhr.responseText,
                cancelButton: false
            });
        }
    });
}