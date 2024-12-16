<main class="form_regs">
    <h2>Inscription</h2>
    <form action="<?= BASE_URL ?>register" method="POST">
      <div class="form-group">
          <label for="name">Nom :</label>
          <input type="text" id="name" name="name" required placeholder="Entrez votre nom">
      </div>
      <div class="form-group">
          <label for="email">Email :</label>
          <input type="email" id="email" name="email" required placeholder="Entrez votre email">
      </div>
      <div class="form-group">
          <label for="password">Mot de passe :</label>
          <input type="password" id="password" name="password" required placeholder="Entrez votre mot de passe">
      </div>
      <button type="submit" class="btn-register">S'inscrire</button>
    </form>
</main>
