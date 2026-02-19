
<div class="auth-page">
    <div class="auth-container">
        <!-- Sidebar contextuelle -->
        <div class="auth-sidebar">
            <h2>RAVI DE VOUS REVOIR.</h2>
            <p>Connectez-vous pour retrouver vos favoris et vos commandes HOLY.</p>
        </div>

        <!-- Formulaire -->
        <div class="auth-form-container">
            <h3 style="margin-bottom: 30px;">S'IDENTIFIER</h3>

            <?php if (isset($_GET['login_error'])): ?>
                <div class="auth-alert auth-alert-error">
                    Identifiants incorrects. Veuillez réessayer.
                </div>
            <?php endif; ?>

            <form class="auth-form" action="/auth/login" method="POST">
                <div class="auth-input-group">
                    <label>Email</label>
                    <input class="auth-input" type="email" name="email" placeholder="votre@email.com" required>
                </div>
                
                <div class="auth-input-group">
                    <label>Mot de passe</label>
                    <input class="auth-input" type="password" name="password" placeholder="••••••••" required>
                </div>
                
                <button type="submit" style="width: 100%; margin-top: 20px;">
                    SE CONNECTER
                </button>
            </form>

            <div class="auth-link">
                Pas encore de compte ? <a href="/inscription">Rejoindre la commu HOLY</a>
            </div>
        </div>
    </div>
</div>
