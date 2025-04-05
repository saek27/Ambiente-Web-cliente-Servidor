<?php include '../views/header.php'; ?>

<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Iniciar Sesión</h2>
            <form action="/auth/login" method="POST">
                <div class="form-group">
                    <label>Correo electrónico:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label>Contraseña:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </form>
        </div>
    </div>
</section>

<?php include '../views/footer.php'; ?>