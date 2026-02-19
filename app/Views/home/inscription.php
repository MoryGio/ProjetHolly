
<div class="auth-page" style="background: var(--holy-blue);">
    <div class="auth-container">
        <div class="auth-sidebar" style="background: var(--holy-green);">
            <h2>PRÊT À BRILLER ?</h2>
            <p>Créez votre compte en quelques secondes et profitez de l'univers HOLY.</p>
        </div>

        <!-- Formulaire -->
        <div class="auth-form-container">
            <h3 style="margin-bottom: 30px;">CRÉER UN COMPTE</h3>

            <?php if (isset($_GET['error'])): ?>
                <div class="auth-alert auth-alert-error">
                    <?php if ($_GET['error'] === 'prenom_requis'): ?>
                        Oups ! Le prénom est obligatoire.
                    <?php elseif ($_GET['error'] === 'email_deja_pris'): ?>
                        Cet email a déjà un compte chez nous !
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['success'])): ?>
                <div class="auth-alert auth-alert-success">
                    Compte créé ! Vous pouvez vous connecter.
                </div>
            <?php endif; ?>

            <form class="auth-form" action="/auth/register" method="POST">
                <div class="auth-input-group">
                    <label>Prénom</label>
                    <input class="auth-input" type="text" name="prenom" placeholder="Votre prénom" required>
                </div>

                <div class="auth-input-group">
                    <label>Email</label>
                    <input class="auth-input" type="email" name="email" placeholder="votre@email.com" required>
                </div>
                
                <div class="auth-input-group">
                    <label>Mot de passe</label>
                    <input class="auth-input" type="password" name="password" placeholder="••••••••" required>
                </div>
                
                <button type="submit" style="width: 100%; margin-top: 20px; background: var(--holy-yellow);">
                    S'INSCRIRE MAINTENANT
                </button>
            </form>

            <div class="auth-link">
                Déjà un membre ? <a href="/identification">Connectez-vous ici</a>
            </div>
        </div>
    </div>
</div>
