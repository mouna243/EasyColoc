<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion · Océan sombre</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    body {
      min-height: 100vh;
      background: radial-gradient(circle at 10% 20%, #0b1a2e, #030711 90%);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
    }

    .signin-card {
      background: #0a121f;              /* bleu marine profond */
      max-width: 440px;
      width: 100%;
      padding: 2.5rem 2rem 2.8rem 2rem;
      border-radius: 2.5rem 1rem 2.5rem 1rem;
      /* ombres bleues intenses, multicouches */
      box-shadow:
        0 20px 35px -10px rgba(0, 140, 255, 0.4),      /* bleu vif large */
        0 0 0 1px rgba(0, 180, 255, 0.2) inset,         /* liseré interne léger */
        0 25px 40px -12px #0044ff80,                    /* bleu secondaire */
        0 8px 18px rgba(0, 100, 255, 0.5);              /* ombre proche bleu roi */
      transition: box-shadow 0.2s ease;
      color: #e1f0ff;
    }

    .signin-card:hover {
      box-shadow:
        0 22px 45px -8px #2a7fff,
        0 0 0 1px #1e90ff inset,
        0 30px 50px -15px #0055ff,
        0 10px 25px #0044ee;
    }

    /* Éléments de titre */
    h1 {
      font-size: 2.4rem;
      font-weight: 600;
      letter-spacing: -0.5px;
      margin-bottom: 0.35rem;
      background: linear-gradient(135deg, #aad0ff, #4b9eff);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      text-shadow: 0 0 12px #0055ff99;
    }

    .sub {
      color: #7ba9ff;
      margin-bottom: 2rem;
      border-left: 4px solid #1e6df2;
      padding-left: 1rem;
      font-weight: 350;
      font-size: 1rem;
      text-shadow: 0 2px 5px #003388;
    }

    /* groupe de champs */
    .input-group {
      margin-bottom: 1.7rem;
    }

    label {
      display: block;
      margin-bottom: 0.6rem;
      font-size: 0.9rem;
      font-weight: 500;
      color: #9cbef5;
      text-transform: uppercase;
      letter-spacing: 1px;
      text-shadow: 0 0 6px #004cff;
    }

    /* style des champs dark mode + nuances bleues */
    input {
      width: 100%;
      background: #051020;               /* marine presque noir */
      border: 1.5px solid #1b3b6a;
      border-radius: 1.2rem 0.4rem 1.2rem 0.4rem;
      padding: 0.9rem 1.2rem;
      font-size: 1.1rem;
      color: #e0f0ff;
      outline: none;
      transition: all 0.2s ease;
      box-shadow: 0 0 12px #003cff33, inset 0 2px 5px #000814;
    }

    input:focus {
      border-color: #1e90ff;
      background: #0b1a32;
      box-shadow:
        0 0 18px #0066ff,
        inset 0 1px 6px #004cff;
    }

    input::placeholder {
      color: #2f5585;
      font-weight: 300;
      font-size: 0.95rem;
    }

    /* options supplémentaires (rester connecté + mdp oublié) */
    .options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 1.5rem 0 2.2rem 0;
      font-size: 0.9rem;
    }

    .remember {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      color: #bad2ff;
      cursor: pointer;
    }

    .remember input[type="checkbox"] {
      width: 1.1rem;
      height: 1.1rem;
      accent-color: #2a7fff;
      box-shadow: 0 0 10px #2a7fff;
      border-radius: 0.2rem;
    }

    .forgot-link {
      color: #8ab7ff;
      text-decoration: none;
      font-weight: 500;
      border-bottom: 1px dashed #2a7fff;
      transition: color 0.2s;
    }

    .forgot-link:hover {
      color: #c6deff;
      border-bottom-color: #aad0ff;
      text-shadow: 0 0 8px #3c8eff;
    }

    /* bouton de connexion — bleu vif / royal */
    .signin-btn {
      width: 100%;
      background: linear-gradient(145deg, #0048b3, #002a7a);
      border: none;
      padding: 1rem;
      border-radius: 3rem 0.5rem 3rem 0.5rem;
      font-size: 1.35rem;
      font-weight: 700;
      color: #ebf3ff;
      text-transform: uppercase;
      letter-spacing: 2px;
      cursor: pointer;
      box-shadow:
        0 15px 25px -8px #0039b3,
        0 0 0 2px #1e90ff inset,
        0 0 20px #0077ff;
      transition: all 0.15s ease;
      margin-bottom: 2rem;
    }

    .signin-btn:hover {
      background: linear-gradient(145deg, #003daa, #001f66);
      box-shadow:
        0 18px 32px -6px #2a7fff,
        0 0 0 2px #7abaff inset,
        0 0 30px #3c8dff;
      transform: scale(1.01);
      color: white;
    }

    .signin-btn:active {
      transform: scale(0.98);
      box-shadow: 0 8px 15px #001c70;
    }

    /* mentions inscription / pied */
    .footer-text {
      text-align: center;
      color: #608ac7;
      font-size: 0.95rem;
      text-shadow: 0 0 5px #002c77;
    }

    .footer-text a {
      color: #9ac5ff;
      text-decoration: none;
      font-weight: 600;
      border-bottom: 2px solid #1e6df2;
      padding-bottom: 1px;
      transition: color 0.2s;
    }

    .footer-text a:hover {
      color: #d3e6ff;
      border-bottom-color: #4791ff;
      text-shadow: 0 0 10px #006eff;
    }

    /* effet de lumière externe optionnel */
    .glow-span {
      display: inline-block;
      filter: drop-shadow(0 0 8px #004cff);
    }
  </style>
</head>
<body>
  <div class="signin-card">
    <h1>🌊 connexion</h1>
    <div class="sub">bleu profond · ombre liquide</div>

    <!-- formulaire de connexion -->
    <form>
      <div class="input-group">
        <label for="email">📧 e-mail / identifiant</label>
        <input type="email" id="email" placeholder="prenom.nom@deepsea.com" autocomplete="email">
      </div>

      <div class="input-group">
        <label for="password">🔒 mot de passe</label>
        <input type="password" id="password" placeholder="············" autocomplete="current-password">
      </div>

      <div class="options">
        <label class="remember">
          <input type="checkbox" checked>
          <span>💤 rester connecté</span>
        </label>
        <a href="#" class="forgot-link">mot de passe oublié ?</a>
      </div>

      <button type="submit" class="signin-btn"> › s’immerger ‹ </button>

      <div class="footer-text">
        <span class="glow-span">⚓</span> pas encore de compte ?
        <a href="/signe">créer un accès</a>
      </div>
    </form>

    <!-- petite signature d'ombre (pur décor) -->
    <div style="margin-top: 1.2rem; font-size: 0.7rem; color: #1d4270; text-align: center; text-shadow: 0 0 3px #003cff;">
      ◇ ombre bleue · marine & éclats ◇
    </div>
  </div>
</body>
</html>
