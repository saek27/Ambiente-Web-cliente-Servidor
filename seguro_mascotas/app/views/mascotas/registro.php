<?php include '../views/header.php'; ?>

<section class="container mt-4">
    <h2>Registrar Nueva Mascota</h2>
    <form action="/mascotas/registrar" method="POST">
        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Especie:</label>
            <select name="especie" class="form-control">
                <option value="Perro">Perro</option>
                <option value="Gato">Gato</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</section>

<?php include '../views/footer.php'; ?>