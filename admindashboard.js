document.addEventListener('DOMContentLoaded', function() {
    function showForm(formId) {
        document.querySelectorAll('.form-container').forEach(function(form) {
            form.style.display = 'none';
        });
        document.getElementById(formId).style.display = 'block';
    }

    document.getElementById('btn-dashboard').addEventListener('click', function() {
        showForm('dashboard-form');
    });

    document.getElementById('btn-citas').addEventListener('click', function() {
        showForm('citas-form');
    });

    document.getElementById('btn-doctores').addEventListener('click', function() {
        showForm('doctores-form');
    });

    document.getElementById('btn-reportes').addEventListener('click', function() {
        showForm('reportes-form');
    });

    document.getElementById('btn-configuracion').addEventListener('click', function() {
        showForm('configuracion-form');
    });
});