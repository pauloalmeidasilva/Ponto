<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ponto Digital - Campos do Jordão</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <aside class="sidebar">
        <h2>Ponto Digital</h2>
        <nav>
            <a href="<?= base_url('folha') ?>" class="<?= uri_string() == 'folha' ? 'active' : '' ?>">Gerar Folha</a>
            <a href="<?= base_url('servidores') ?>" class="<?= strpos(uri_string(), 'servid') !== false ? 'active' : '' ?>">Servidores</a>
            <a href="<?= base_url('locais') ?>" class="<?= strpos(uri_string(), 'loc') !== false ? 'active' : '' ?>">Locais</a>
        </nav>
    </aside>
    <main class="main-content">
        <?php if(session()->getFlashdata('error')): ?>
            <div style="background:var(--danger);color:#fff;padding:1rem;border-radius:0.375rem;margin-bottom:1rem;">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <?= $this->renderSection('content') ?>
    </main>
</body>
</html>
