<body class="page-nosproduits">
  <section class="nosproduits">
    <div class="bestsellers">
      <h1>BESTSELLER</h1>
      <p>Les plus grands bangers de HOLY</p>
    </div>
  </section>

  <section class="blockimage">
    <div class="formage">

      <?php foreach ($products as $product): ?>
        <article class="article">

          <!-- Lien vers la fiche produit -->
          <a href="/produit?id=<?= (int)$product['Id'] ?>">
            <img src="Image/<?= htmlspecialchars($product['Image']) ?>" alt="">
            <h3><?= htmlspecialchars($product['Nom']) ?></h3>
          </a>

          <!-- (Optionnel) Affichage du prix si dispo -->
          <?php if (isset($product['prix'])): ?>
            <p><?= number_format((float)$product['prix'], 2, ',', ' ') ?> €</p>
          <?php endif; ?>

          <!-- Formulaire Ajouter au panier -->
          <form method="POST" action="/cart/add-from-form">
            <input type="hidden" name="product_id" value="<?= (int)$product['Id'] ?>">
            <input type="hidden" name="quantite" value="1">
            <input type="hidden" name="user_id" value="1">

            <button
              type="submit"
              <?= (isset($product['stock']) && (int)$product['stock'] <= 0) ? 'disabled' : '' ?>
            >
              🛒 Ajouter au panier
            </button>
          </form>

        </article>
      <?php endforeach; ?>

    </div>
  </section>
</body>
 