<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário IFTO</title>
    <style>
        :root {
            --ifto-green: #0f7a3d;
            --ifto-green-dark: #0a5c2e;
            --ifto-green-soft: #dff3e6;
            --ifto-red: #c62828;
            --ifto-white: #ffffff;
            --ifto-ink: #143322;
            --ifto-surface: rgba(255, 255, 255, 0.94);
            --ifto-shadow: rgba(10, 46, 25, 0.22);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: var(--ifto-ink);
            background:
                radial-gradient(circle at top left, rgba(198, 40, 40, 0.18), transparent 22%),
                radial-gradient(circle at right center, rgba(15, 122, 61, 0.26), transparent 28%),
                linear-gradient(135deg, #eef8f1 0%, #d3eadc 45%, #f8fbf8 100%);
        }

        .page-shell {
            width: min(880px, 100%);
            overflow: hidden;
            border-radius: 28px;
            background: var(--ifto-surface);
            box-shadow: 0 28px 60px var(--ifto-shadow);
            backdrop-filter: blur(10px);
        }

        .hero {
            position: relative;
            padding: 48px 56px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            overflow: hidden;
            color: var(--ifto-white);
            background:
                linear-gradient(160deg, rgba(10, 92, 46, 0.92), rgba(15, 122, 61, 0.92)),
                linear-gradient(45deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0));
        }

        .hero::before,
        .hero::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
        }

        .hero::before {
            width: 220px;
            height: 220px;
            top: -40px;
            right: -60px;
        }

        .hero::after {
            width: 140px;
            height: 140px;
            bottom: 30px;
            left: -30px;
        }

        .brand,
        .hero-copy {
            position: relative;
            z-index: 1;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 14px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .brand-mark {
            display: grid;
            grid-template-columns: repeat(2, 16px);
            gap: 6px;
        }

        .brand-mark span {
            width: 16px;
            height: 16px;
            border-radius: 4px;
            background: var(--ifto-white);
        }

        .brand-mark span:last-child {
            background: var(--ifto-red);
        }

        .hero-copy {
            max-width: 470px;
        }

        .hero-copy h1 {
            margin: 0 0 10px;
            font-size: clamp(1.8rem, 3vw, 2.7rem);
            line-height: 1.1;
        }

        .hero-copy p {
            margin: 0;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.88);
        }

        .panel {
            padding: 36px 40px 44px;
        }

        .card {
            padding: 24px;
            border: 1px solid #d8ebdd;
            border-radius: 22px;
            background: #f7fcf9;
        }

        .card h2 {
            margin: 0 0 20px;
            color: var(--ifto-green-dark);
            font-size: 1.5rem;
        }

        .user-data {
            margin: 0;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .field {
            padding: 18px;
            border: 1px solid #e3efe6;
            border-radius: 16px;
            background: var(--ifto-white);
        }

        .field:first-child {
            grid-column: 1 / -1;
        }

        dt {
            margin-bottom: 7px;
            color: var(--ifto-green-dark);
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        dd {
            margin: 0;
            overflow-wrap: anywhere;
            font-size: 1.05rem;
        }

        @media (max-width: 720px) {
            .hero {
                padding: 36px 28px;
                flex-direction: column;
                align-items: flex-start;
            }

            .panel {
                padding: 24px 16px 32px;
            }

            .card {
                padding: 16px;
            }

            .user-data {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <main class="page-shell">
        <section class="hero">
            <div class="brand" aria-label="IFTO">
                <div class="brand-mark" aria-hidden="true">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <span>IFTO</span>
            </div>

            <div class="hero-copy">
                <h1>Detalhes do usuário</h1>
                <p>Confira as informações do usuário cadastrado no sistema.</p>
            </div>
        </section>

        <section class="panel">
            <?php if ($usuario): ?>
                <article class="card">
                    <h2><?= htmlspecialchars((string) ($usuario['nome'] ?? 'Usuário')) ?></h2>

                    <dl class="user-data">
                        <div class="field">
                            <dt>Identificador</dt>
                            <dd><?= htmlspecialchars((string) ($usuario['id'] ?? 'Não informado')) ?></dd>
                        </div>
                        <div class="field">
                            <dt>Nome</dt>
                            <dd><?= htmlspecialchars((string) ($usuario['nome'] ?? 'Não informado')) ?></dd>
                        </div>
                        <div class="field">
                            <dt>E-mail</dt>
                            <dd><?= htmlspecialchars((string) ($usuario['email'] ?? 'Não informado')) ?></dd>
                        </div>
                    </dl>
                </article>
            <?php else: ?>
                <h3 style="text-align:center;">
                    Usuário não encontrado!
                </h3>
            <?php endif; ?>
        </section>
    </main>
</body>

</html>