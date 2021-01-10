<header>
    <nav>
        <form class="menu" action="opciones.php" method="POST">
            <input class="navegacion" type="submit" name="option" value="Actualizar">
            <?php if(empty($admin)): ?>
                <input class="navegacion" type="submit" name="option" value="Iniciar Sesión">
                <input class="navegacion" type="submit" name="option" value="Registrarse">
            <?php else: ?>
                <input class="navegacion" type="submit" name="option" value="Mi Perfil">
                <input class="navegacion" type="submit" name="option" value="Nuevo Item">
                <input class="navegacion" type="submit" name="option" value="Borrar Item">
                <input class="navegacion" type="submit" name="option" value="Cerrar Sesión">
            <?php endif; ?>
        </form>
    </nav>
</header>