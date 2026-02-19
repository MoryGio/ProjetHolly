
<section style="padding: 100px 5vw; background: var(--holy-blue); border-bottom: 3px solid black;">
    <div style="max-width: 800px;">
        <h1 style="color: white; margin-bottom: 20px;">BESTSELLERS</h1>
        <p style="font-size: 1.5rem; font-weight: 700; color: white;">Les plus grands bangers de HOLY, réunis au même endroit.</p>
    </div>
</section>

<section class="section3">
    <div class="formage">
        <?php foreach ($products as $product): ?>
            <article class="article">
                <a href="/produit?id=<?= (int)($product['id'] ?? $product['Id']) ?>" style="flex-grow: 1; text-decoration: none; color: inherit;">
                    <div style="position: relative; overflow: hidden; margin-bottom: 20px;">
                        <img src="/Image/image_produits/<?= htmlspecialchars($product['Image'] ?? $product['image']) ?>" alt="<?= htmlspecialchars($product['Nom'] ?? $product['nom']) ?>">
                    </div>
                    <h3><?= htmlspecialchars($product['Nom'] ?? $product['nom']) ?></h3>
                    
                    <?php if (isset($product['prix'])): ?>
                        <div style="margin: 15px 0; display: flex; align-items: center; gap: 10px;">
                            <span style="font-size: 1.8rem; font-weight: 800; color: var(--holy-blue);"><?= number_format((float)$product['prix'], 2, ',', ' ') ?> €</span>
                            <span style="font-size: 0.9rem; opacity: 0.6; font-weight: 700;">(0.80€ / portion)</span>
                        </div>
                    <?php endif; ?>
                </a>

                <form method="POST" action="/cart/add-from-form">
                    <input type="hidden" name="product_id" value="<?= (int)($product['id'] ?? $product['Id']) ?>">
                    <input type="hidden" name="quantite" value="1">
                    <button type="submit" style="width: 100%;" class="btn" 
                        <?= (isset($product['stock']) && (int)$product['stock'] <= 0) ? 'disabled style="background: #ccc; cursor: not-allowed;"' : '' ?>>
                        <?= (isset($product['stock']) && (int)$product['stock'] <= 0) ? 'RUPTURE DE STOCK' : '🛒 AJOUTER AU PANIER' ?>
                    </button>
                </form>
            </article>
        <?php endforeach; ?>
    </div>
</section>
