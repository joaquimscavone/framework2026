<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários IFTO</title>
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
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: var(--ifto-ink);
            background:
                radial-gradient(circle at top left, rgba(198, 40, 40, 0.18), transparent 22%),
                radial-gradient(circle at right center, rgba(15, 122, 61, 0.26), transparent 28%),
                linear-gradient(135deg, #eef8f1 0%, #d3eadc 45%, #f8fbf8 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .page-shell {
            width: min(1080px, 100%);
            background: var(--ifto-surface);
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 28px 60px var(--ifto-shadow);
            backdrop-filter: blur(10px);
        }

        .hero {
            position: relative;
            padding: 48px 56px;
            background:
                linear-gradient(160deg, rgba(10, 92, 46, 0.92), rgba(15, 122, 61, 0.92)),
                linear-gradient(45deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0));
            color: var(--ifto-white);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
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

        .brand {
            position: relative;
            z-index: 1;
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
            position: relative;
            z-index: 1;
            max-width: 520px;
        }

        .hero-copy h1 {
            margin: 0 0 10px;
            font-size: clamp(1.8rem, 3vw, 2.7rem);
            line-height: 1.1;
        }

        .hero-copy p {
            margin: 0;
            font-size: 1rem;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.88);
        }

        .panel {
            padding: 36px 40px 44px;
        }

        .card {
            background: #f7fcf9;
            border: 1px solid #d8ebdd;
            border-radius: 22px;
            padding: 24px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 18px;
        }

        .card-header h2 {
            margin: 0;
            font-size: 1.5rem;
            color: var(--ifto-green-dark);
        }

        .card-header p {
            margin: 6px 0 0;
            color: #587761;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 999px;
            background: var(--ifto-green-soft);
            color: var(--ifto-green-dark);
            font-weight: 700;
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px 12px;
            border-bottom: 1px solid #e3efe6;
            text-align: left;
        }

        th {
            background: var(--ifto-green-soft);
            color: var(--ifto-green-dark);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        tbody tr:hover {
            background: #f3fbf5;
        }

        .empty {
            padding: 18px;
            border-radius: 16px;
            background: #fff7f7;
            color: #8e2b2b;
            border: 1px solid #f3d8d8;
        }

        @media (max-width: 720px) {
            .hero {
                flex-direction: column;
                align-items: flex-start;
            }

            .panel {
                padding: 24px 16px 32px;
            }

            .card {
                padding: 16px;
            }

            th,
            td {
                padding: 12px 8px;
            }
        }
    </style>
</head>

<body>
    <main class="page-shell">
        <section class="hero">
            <div class="brand" aria-label="IFTO">
                <div class="brand-mark">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <span>IFTO</span>
            </div>
            <div class="hero-copy">
                <h1>Lista de usuários</h1>
                <p>Confira todos os usuários cadastrados no sistema com o mesmo padrão visual do painel antigo.</p>
            </div>
        </section>

        <section class="panel">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2>Usuários cadastrados</h2>
                        <p>Dados exibidos diretamente do banco.</p>
                    </div>
                    <span class="badge">Total: <?= count($usuarios ?? []) ?></span>
                </div>

                <?php if (empty($usuarios)): ?>
                    <div class="empty">Nenhum usuário encontrado no sistema.</div>
                <?php else: ?>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>E-mail</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= htmlspecialchars((string) ($usuario['id'] ?? '')) ?></td>
                <td><?= htmlspecialchars((string) ($usuario['nome'] ?? '')) ?></td>
                <td><?= htmlspecialchars((string) ($usuario['email'] ?? '')) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
                <?php endif; ?>
            </div>
        </section>
    </main>
</body>

</html>