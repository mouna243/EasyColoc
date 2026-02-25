<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription · Abysses bleues</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    body {
      min-height: 100vh;
      background: radial-gradient(circle at 90% 10%, #0c1f36, #020812 95%);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
    }

    /* carte avec ombres bleues marines */
    .register-card {
      background: #0b1423;              /* bleu nuit profond */
      max-width: 480px;
      width: 100%;
      padding: 2.6rem 2.2rem 2.8rem 2.2rem;
      border-radius: 2rem 1rem 2rem 1rem;
      box-shadow:
        0 20px 40px -8px #0044ff,
        0 0 0 1px #1f6eb0 inset,
        0 25px 45px -15px #002a99,
        0 10px 25px -5px #0033aa;
      transition: box-shadow 0.2s ease;
      color: #e0efff;
    }

    .register-card:hover {
      box-shadow:
        0 22px 48px -6px #2f7fff,
        0 0 0 2px #3894ff inset,
        0 30px 50px -12px #0059ff,
        0 12px 30px -3px #0044cc;
    }

    /* Titre avec éclat bleu */
    h1 {
      font-size: 2.6rem;
      font-weight: 600;
      letter-spacing: -0.5px;
      margin-bottom: 0.3rem;
      background: linear-gradient(145deg, #bbdbff, #3c83ff);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      text-shadow: 0 0 15px #0040ff;
    }

    .sous-titre {
      color: #7dabf0;
      margin-bottom: 2.3rem;
      border-left: 4px solid #2670e8;
      padding-left: 1rem;
      font-weight: 350;
      font-size: 1rem;
      text-shadow: 0 2px 6px #00246e;
    }

    /* groupes de champs */
    .champ {
      margin-bottom: 1.7rem;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
      font-size: 0.9rem;
      font-weight: 500;
      color: #9fbef7;
      text-transform: uppercase;
      letter-spacing: 1px;
      text-shadow: 0 0 6px #1040b0;
    }

    input {
      width: 100%;
      background: #061020;               /* fond très sombre */
      border: 2px solid #1f4172;
      border-radius: 1.5rem 0.5rem 1.5rem 0.5rem;
      padding: 0.9rem 1.3rem;
      font-size: 1.05rem;
      color: #ddf0ff;
      outline: none;
      transition: all 0.2s ease;
      box-shadow: 0 0 10px #0033aa33, inset 0 2px 6px #000000;
    }

    input:focus {
      border-color: #2f8cff;
      background: #0a1c38;
      box-shadow:
        0 0 22px #1f6fff,
        inset 0 1px 8px #0050dd;
    }

    input::placeholder {
      color: #2e5588;
      font-weight: 300;
      font-size: 0.95rem;
    }

    /* champ spécifique pour le nom (aucun changement, cohérence) */
    /* Bouton d'inscription */
    .register-btn {
      width: 100%;
      background: linear-gradient(150deg, #003d9e, #001b62);
      border: none;
      padding: 1rem 1.5rem;
      margin: 2rem 0 1.8rem 0;
      border-radius: 3rem 0.7rem 3rem 0.7rem;
      font-size: 1.5rem;
      font-weight: 700;
      color: #e2f0ff;
      text-transform: uppercase;
      letter-spacing: 3px;
      cursor: pointer;
      box-shadow:
        0 18px 28px -8px #002fac,
        0 0 0 2px #3283ff inset,
        0 0 20px #0051ff;
      transition: all 0.15s ease;
    }

    .register-btn:hover {
      background: linear-gradient(150deg, #003bb0, #00206b);
      box-shadow:
        0 22px 35px -6px #2d74ff,
        0 0 0 2px #7cb4ff inset,
        0 0 30px #3f8cff;
      transform: scale(1.02);
      color: white;
    }

    .register-btn:active {
      transform: scale(0.98);
      box-shadow: 0 8px 15px #001f66;
    }

    /* mention connexion existante */
    .footer-lien {
      text-align: center;
      color: #5f89cc;
      font-size: 1rem;
      text-shadow: 0 0 5px #002a7a;
    }

    .footer-lien a {
      color: #9dc3ff;
      text-decoration: none;
      font-weight: 600;
      border-bottom: 2px solid #236ad0;
      padding-bottom: 2px;
      transition: color 0.2s;
    }

    .footer-lien a:hover {
      color: #d6e8ff;
      border-bottom-color: #5294ff;
      text-shadow: 0 0 8px #006eff;
    }

    /* petite signature "ombre bleue" */
    .signature-ombre {
      margin-top: 1.5rem;
      font-size: 0.7rem;
      color: #1d4270;
      text-align: center;
      text-shadow: 0 0 5px #103eb0;
      letter-spacing: 1px;
    }

    /* astérisque optionnel */
    .note-champs {
      font-size: 0.8rem;
      color: #3568b0;
      margin-top: -0.5rem;
      margin-bottom: 1rem;
      text-align: right;
      text-shadow: 0 0 3px #002c9e;
    }
  </style>
</head>
<body>
  <div class="register-card">
    <h1>⚓ inscription</h1>
    <div class="sous-titre">créez votre profil · bleu abyssal</div>

    <form>
      <!-- Champ NOM (prénom/nom) -->
      <div class="champ">
        <label for="nom">🧾 nom complet</label>
        <input type="text" id="nom" placeholder="ex: Marie Aegir" autocomplete="name">
      </div>

      <!-- Champ EMAIL -->
      <div class="champ">
        <label for="email">📧 adresse email</label>
        <input type="email" id="email" placeholder="prenom@deep.com" autocomplete="email">
      </div>

      <!-- Champ PASSWORD -->
      <div class="champ">
        <label for="password">🔒 mot de passe</label>
        <input type="password" id="password" placeholder="················" autocomplete="new-password">
      </div>

      <!-- petite indication (facultatif, renforce le thème) -->
      <div class="note-champs">⋆⫸ au moins 8 caractères, mer</div>

      <!-- Bouton register -->
      <button type="submit" class="register-btn"> ⚡ plonger ⚡ </button>

      <!-- Lien vers connexion si déjà compte -->
      <div class="footer-lien">
        <span>déjà un sillage ?</span>
        <a href="#">connectez-vous</a>
      </div>
    </form>

 
  </div>
</body>
</html>
