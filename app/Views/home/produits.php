
<section class="ficheproduit" style="min-height: calc(100vh - 80px); display: grid; grid-template-columns: 1fr 1fr; border-bottom: 3px solid black;">
    <!-- Colonne Image -->
    <div class="produitimage" style="background: white; border-right: 3px solid black; display: flex; justify-content: center; align-items: center; padding: 5vw; position: relative; overflow: hidden;">
        <!-- Texte en arrière-plan pour le style -->
        <div style="position: absolute; font-family: 'Anton'; font-size: 15vw; color: rgba(0,0,0,0.03); white-space: nowrap; z-index: 1; pointer-events: none; transform: rotate(-5deg);">
            HOLY REVOLUTION
        </div>
        
        <div style="position: relative; z-index: 2;">
            <img src="/Image/image_produits/<?= htmlspecialchars($product['Image'] ?? $product['image']) ?>" 
                 alt="<?= htmlspecialchars($product['Nom'] ?? $product['nom']) ?>" 
                 style="width: 100%; max-width: 550px; transform: rotate(-3deg); filter: drop-shadow(40px 40px 0px rgba(0,0,0,0.1)); transition: transform 0.5s var(--ease);">
            
            <div style="position: absolute; top: -30px; right: -30px; background: var(--holy-yellow); border: 3px solid black; padding: 15px 25px; font-family: 'Anton'; font-size: 1.8rem; transform: rotate(12deg); box-shadow: 6px 6px 0px black;">
                100% GOÛT
            </div>
        </div>
    </div>

    <!-- Colonne Texte -->
    <div class="produittexte" style="padding: 6vw; display: flex; flex-direction: column; justify-content: center; background: var(--holy-off-white);">
        <nav style="margin-bottom: 30px; font-weight: 800; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 1px;">
            <a href="/nosproduits" style="text-decoration: underline;">Boutique</a> / <?= htmlspecialchars($product['Nom'] ?? $product['nom']) ?>
        </nav>

        <h1 style="font-size: clamp(3.5rem, 8vw, 6rem); margin-bottom: 20px; color: var(--holy-black);"><?= htmlspecialchars($product['Nom'] ?? $product['nom']) ?></h1>
        
        <div style="display: flex; align-items: baseline; gap: 20px; margin-bottom: 40px;">
            <span style="font-family: 'Anton'; font-size: 4rem; color: var(--holy-blue);"><?= number_format((float)($product['prix'] ?? 0), 2, ',', ' ') ?> €</span>
            <span style="font-weight: 800; font-size: 1.2rem; opacity: 0.5;">TTC</span>
        </div>

        <p style="font-size: 1.3rem; font-weight: 500; margin-bottom: 40px; line-height: 1.6; max-width: 600px; color: #444;">
            <?= htmlspecialchars($product['Description'] ?? "L'alternative ultime aux soft drinks classiques. Zéro sucre, vitamines essentielles, et une explosion de saveurs naturelles.") ?>
        </p>

        <!-- Sélecteur de Taille / Format (Look HOLY) -->
        <div style="margin-bottom: 40px;">
            <p style="font-weight: 800; text-transform: uppercase; margin-bottom: 15px; font-size: 0.9rem;">Choisir le format :</p>
            <div style="display: flex; gap: 15px;">
                <div style="border: 3px solid black; padding: 15px 25px; background: white; box-shadow: 4px 4px 0px black; font-weight: 800; cursor: pointer; background: var(--holy-yellow);">
                    POT (50 PORTIONS)
                </div>
                <div style="border: 3px solid #ddd; padding: 15px 25px; background: #eee; color: #888; font-weight: 800; cursor: not-allowed; text-decoration: line-through;">
                    SACHETS (10 PORTIONS)
                </div>
            </div>
        </div>

        <!-- Formulaire d'ajout -->
        <div style="border: 3px solid black; padding: 40px; background: white; box-shadow: 15px 15px 0px var(--holy-black); max-width: 550px;">
            <form method="POST" action="/cart/add-from-form" style="display: flex; flex-direction: column; gap: 25px;">
                <input type="hidden" name="product_id" value="<?= htmlspecialchars((string)($product['Id'] ?? $product['id'])) ?>">
                
                <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid #eee; padding-bottom: 20px;">
                    <label style="font-weight: 800; text-transform: uppercase; font-size: 1.1rem;">Quantité</label>
                    <input type="number" name="quantite" value="1" min="1" max="<?= htmlspecialchars((string)($product['stock'] ?? 100)) ?>" 
                           class="register__input" style="width: 120px; margin-bottom: 0; text-align: center; font-size: 1.5rem; font-family: 'Anton'; background: #f9f9f9;">
                </div>

                <button type="submit" class="btn" style="width: 100%; font-size: 1.8rem; padding: 25px;">
                    AJOUTER AU PANIER
                </button>
            </form>
            <p style="text-align: center; margin-top: 20px; font-weight: 700; font-size: 0.9rem;">
                🚀 Livraison offerte (4-7 jours ouvrés)
            </p>
        </div>
    </div>
</section>

<!-- Section Avantages (Petit rappel) -->
<section style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); border-bottom: 3px solid black; background: white;">
    <div style="padding: 40px; border-right: 3px solid black; text-align: center;">
        <h3 style="margin-bottom: 10px;">ZÉRO SUCRE</h3>
        <p style="font-size: 0.9rem; font-weight: 600;">Santé & Énergie sans crash.</p>
    </div>
    <div style="padding: 40px; border-right: 3px solid black; text-align: center;">
        <h3 style="margin-bottom: 10px;">VITAMINES</h3>
        <p style="font-size: 0.9rem; font-weight: 600;">Antioxydants & Électrolytes.</p>
    </div>
    <div style="padding: 40px; border-right: 3px solid black; text-align: center;">
        <h3 style="margin-bottom: 10px;">DURABLE</h3>
        <p style="font-size: 0.9rem; font-weight: 600;">90% moins de plastique.</p>
    </div>
    <div style="padding: 40px; text-align: center; background: var(--holy-blue); color: white;">
        <h3 style="margin-bottom: 10px; color: white;">QUALITÉ</h3>
        <p style="font-size: 0.9rem; font-weight: 600;">Fabriqué en Allemagne.</p>
    </div>
</section>
