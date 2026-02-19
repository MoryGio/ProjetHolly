
<section class="cart-container">
    <div style="border-bottom: 3px solid black; padding-bottom: 30px; margin-bottom: 50px; display: flex; justify-content: space-between; align-items: baseline;">
        <h1>TON PANIER</h1>
        <span style="font-weight: 800; font-size: 1.2rem; opacity: 0.6;"><?= count($cartItems) ?> ARTICLE(S)</span>
    </div>

    <?php if (empty($cartItems)): ?>
        <div style="text-align: center; padding: 100px 0;">
            <p style="font-size: 2rem; font-weight: 800; margin-bottom: 40px; text-transform: uppercase;">Ton panier attend sa dose de HOLY.</p>
            <a href="/nosproduits" class="btn">DÉCOUVRIR NOS PRODUITS</a>
        </div>
    <?php else: ?>
        <div style="display: grid; grid-template-columns: 1fr 400px; gap: 60px; align-items: start;">
            
            <!-- Liste des produits -->
            <div style="display: flex; flex-direction: column; gap: 30px;">
                <?php foreach ($cartItems as $item): ?>
                    <article class="cart-item" style="border: 3px solid black; background: white; box-shadow: 6px 6px 0px black; padding: 25px;">
                        <img src="/Image/image_produits/<?= htmlspecialchars($item['Image'] ?? $item['image']) ?>" alt="" style="width: 120px; border: 2px solid black;">
                        
                        <div style="display: flex; flex-direction: column; justify-content: center;">
                            <h3 style="font-size: 1.8rem; margin-bottom: 10px;"><?= htmlspecialchars($item['Nom'] ?? $item['nom']) ?></h3>
                            <p style="font-weight: 800; color: var(--holy-blue); font-size: 1.2rem;"><?= number_format((float)$item['prix'], 2, ',', ' ') ?> € l'unité</p>
                        </div>

                        <div style="display: flex; flex-direction: column; align-items: flex-end; justify-content: center; gap: 15px;">
                            <form action="/cart/update" method="POST" style="display: flex; gap: 10px;">
                                <input type="hidden" name="cart_id" value="<?= $item['panier_id'] ?>">
                                <input type="number" name="quantite" value="<?= $item['quantite'] ?>" min="1" class="register__input" style="width: 70px; margin: 0; padding: 10px; text-align: center;">
                                <button type="submit" class="btn" style="padding: 10px; box-shadow: 2px 2px 0px black;">ok</button>
                            </form>
                            
                            <form action="/cart/remove" method="POST">
                                <input type="hidden" name="cart_id" value="<?= $item['panier_id'] ?>">
                                <button type="submit" style="background: none; border: none; font-weight: 800; color: #888; cursor: pointer; text-decoration: underline;">SUPPRIMER</button>
                            </form>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <!-- Résumé -->
            <aside style="background: var(--holy-yellow); border: 3px solid black; padding: 40px; box-shadow: 12px 12px 0px black;">
                <h2 style="font-size: 2rem; margin-bottom: 30px;">RÉSUMÉ</h2>
                
                <div style="display: flex; flex-direction: column; gap: 15px; margin-bottom: 30px; font-weight: 700;">
                    <div style="display: flex; justify-content: space-between;">
                        <span>SOUS-TOTAL</span>
                        <span><?= number_format((float)$total, 2, ',', ' ') ?> €</span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span>LIVRAISON</span>
                        <span style="color: var(--holy-blue);">OFFERTE</span>
                    </div>
                </div>

                <div style="border-top: 3px solid black; padding-top: 20px; margin-bottom: 40px; display: flex; justify-content: space-between; align-items: baseline;">
                    <span style="font-weight: 800; font-size: 1.5rem;">TOTAL</span>
                    <span style="font-family: 'Anton'; font-size: 3rem;"><?= number_format((float)$total, 2, ',', ' ') ?> €</span>
                </div>

                <button class="btn" style="width: 100%; background: var(--holy-black); color: white;">PASSER À LA CAISSE</button>
                
                <form action="/cart/clear" method="POST" style="margin-top: 20px; text-align: center;">
                    <button type="submit" style="background: none; border: none; font-weight: 800; color: var(--holy-black); text-decoration: underline; box-shadow: none;">VIDER MON PANIER</button>
                </form>
            </aside>
        </div>
    <?php endif; ?>
</section>
