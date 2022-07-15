<div class="container">
  <header class="d-flex flex-wrap align-items-right justify-content-right justify-content-md-between py-3 mb-4 border-bottom">

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="#" class="nav-link px-2 link-secondary">Accueil</a></li>
      <li><a href="#" class="nav-link px-2 link-dark">Projets</a></li>
      <li><a href="#" class="nav-link px-2 link-dark">Contact</a></li>
    </ul>

    <?php if (isset($_SESSION['connected']) && $_SESSION['connected']): ?>
    <div class="col-md-3 text-end">
      <button type="button" class="btn btn-outline-primary me-2">Login</button>
    </div>
    <?php endif; ?>
  </header>
</div>
