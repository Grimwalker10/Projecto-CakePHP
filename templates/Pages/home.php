<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tu Aplicación</title>
    <!-- Enlaces a los estilos de Bootstrap y otros archivos -->
    <?= $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css') ?>
    <?= $this->Html->css('https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css') ?>

    <!-- Enlace a jQuery y jQuery UI -->
    <?= $this->Html->script('https://code.jquery.com/jquery-3.5.1.min.js') ?>
    <?= $this->Html->script('https://code.jquery.com/ui/1.12.1/jquery-ui.js') ?>

    <!-- Enlace a Bootstrap JS -->
    <?= $this->Html->script('https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js') ?>

    <!-- Enlace a Font Awesome -->
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js') ?>

    <style>
        .navbar-nav .nav-link {
            font-size: 18px; /* Aumenta el tamaño de las letras en los enlaces de navegación */
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <?= $this->Html->link('SuperStar', ['controller' => 'Pages', 'action' => 'home'], ['class' => 'navbar-brand']) ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav">
        <li class="nav-item">
          <?= $this->Html->link('Equipos', ['controller' => 'Equipos', 'action' => 'index'], ['class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
          <?= $this->Html->link('Jugadores', ['controller' => 'Jugadores', 'action' => 'index'], ['class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
          <?= $this->Html->link('Resultados', ['controller' => 'Resultados', 'action' => 'index'], ['class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
          <?= $this->Html->link('TipoTiro', ['controller' => 'TipoTiro', 'action' => 'index'], ['class' => 'nav-link']) ?>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-2">
<?=
    $this->Html->image('intro.jpg', [
    'alt' => 'Descripción de la imagen',
    'class' => 'tu-clase-css',
]); 
?>
<div>
<div class="container mt-4">
    <!-- Contenido específico de la página -->
    <?= $this->fetch('content') ?>
</div>

<?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js') ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js') ?>
<?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js') ?>
</body>
</html>


