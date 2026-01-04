<!-- Vue du panier -->
<div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
    <h2>Mon panier</h2>
    <?php if (empty($cartItems)): ?>
        <p>Votre panier est vide.</p>
        <a href="/nosproduits">Voir les produits</a>
    
        <!-- Liste des articles -->
        <?php foreach ($cartItems as $item): ?>
            <?php if (!empty($cartItems)): ?>
                <?php foreach ($cartItems as $item): ?>
                    ...
                <?php endforeach; ?>
                <?php else: ?>
                <p>Panier vide.</p>
                <?php endif; ?>
            <div>
                <h3><?= htmlspecialchars($item['nom']) ?></h3>
                <p>Prix : <?= number_format($item['prix'], 2, ',', ' ') ?> €</p>
                <p>Quantité : <?= htmlspecialchars($item['quantite']) ?></p>
                
                <!-- Formulaire pour mettre à jour la quantité -->
                <form method="POST" action="/cart/update">
                    <input type="hidden" name="cart_id" value="<?= htmlspecialchars($item['panier_id']) ?>">
                    <input type="number" name="quantite" value="<?= htmlspecialchars($item['quantite']) ?>" min="1">
                    <button type="submit">Mettre à jour</button>
                </form>
                
                <!-- Formulaire pour supprimer -->
                <form method="POST" action="/cart/remove">
                    <input type="hidden" name="cart_id" value="<?= htmlspecialchars($item['panier_id']) ?>">
                    <button type="submit">Supprimer</button>
                </form>
            </div>
        <?php endforeach; ?>
        
        <!-- Total -->
        <div>
            <strong>Total : <?= number_format($total, 2, ',', ' ') ?> €</strong>
        </div>
        
        <!-- Vider le panier -->
        <form method="POST" action="/cart/clear">
            <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">
            <button type="submit">Vider le panier</button>
        </form>
    
    <?php endif; ?>
</div>