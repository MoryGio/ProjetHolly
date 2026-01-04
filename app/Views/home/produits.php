<body class='page-produit'>
<section class='ficheproduit'>
    <div class='produitimage'>
        <img src="/Image/<?= htmlspecialchars($product['Image']) ?>" alt="">
    </div>
    <div class='produittexte'>
        <h1><?= htmlspecialchars($product['Nom']) ?></h1>
        <p><?= htmlspecialchars($product['Description']) ?></p>
        <h2>Prix :</h2>
        
       <p><?= htmlspecialchars($product['prix']) ?> €</p>
        <button class='btn-ajouter'>Ajouter au panier</button>
        <section class='howtodo'>
    <nav>
        <div class='howtodoimg'>
            <article class='etape'>
                <img src="Image/3_df65f400-f4c9-429a-b46b-3bc06e0ba098_1000x.webp" alt="">
    
                <h3 class ='howtodoh3'>Étape 1</h3>
            </article>
            
            <article class='etape'>
                <img src="/Image/Product_picture_photoshoot_shot_14_1000x.webp" alt="">
                <h3 class ='howtodoh3'>Étape 2</h3>
            </article>

            <article class='etape'>
                <img src="/Image/4_833b8aef-e278-49ac-9400-463847ca8e9b_1000x.webp" alt="">
                <h3 class ='howtodoh3'>Étape 3</h3>
            </article>
        </div>
        
    <div>
        <h3><?= htmlspecialchars($product['Nom']) ?></h3>
        <p><?= number_format($product['prix'], 2, ',', ' ') ?> €</p>
        
    <!-- app/Views/product/show.php -->
<form method="POST" action="/cart">
    <input type="hidden" name="product_id" value="<?= $products['id'] ?>">
    <input type="hidden" name="user_id" value="1">
    <label>Quantité :</label>
    <input type="number" name="quantite" value="1" min="1" max="<?= $products['stock'] ?>">
    <button type="submit">Ajouter au panier</button>
</form>
    </div>

    </nav>
</section>
    </div>
</section>