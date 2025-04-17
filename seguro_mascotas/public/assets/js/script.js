document.querySelectorAll('.contratar-btn').forEach(button => {
    button.addEventListener('click', () => {
        const planId = button.getAttribute('data-plan-id');

        // Simula cliente y mascota si aún no hay login/registro
        const clienteId = 1; // debería venir de sesión PHP
        const mascotaId = 1;

        fetch('contratar_plan.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `plan_id=${planId}&cliente_id=${clienteId}&mascota_id=${mascotaId}`
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // Mostrar respuesta del servidor
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});