<main class="form_regs">
    <h2>Connexion</h2>
    <form action="<?= BASE_URL ?>login" method="POST">
      <div class="form-group">
          <label for="email">Email :</label>
          <input type="email" id="email" name="email" required placeholder="Entrez votre email">
      </div>
      <div class="form-group">
          <label for="password">Mot de passe :</label>
          <input type="password" id="password" name="password" required placeholder="Entrez votre mot de passe">
      </div>
      <button type="submit" class="btn-register">Se connecter</button>
    </form>
</main>
