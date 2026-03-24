<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="page-header">
    <h1>Gerar Folha de Ponto</h1>
</div>

<div class="card" style="max-width: 600px;">
    <form action="<?= base_url('folha/imprimir') ?>" method="POST" target="_blank">
        
        <div class="form-group">
            <label>Selecione o Servidor</label>
            <select name="servidor_id" class="form-control" required>
                <option value="">-- Selecione --</option>
                <?php foreach($servidores as $s): ?>
                    <option value="<?= $s->id ?>"><?= esc($s->nome) ?> (<?= esc($s->matricula) ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Mês (1 a 12)</label>
                <input type="number" min="1" max="12" name="mes" class="form-control" value="<?= date('n') ?>" required>
            </div>
            <div class="form-group">
                <label>Ano</label>
                <input type="number" min="2000" name="ano" class="form-control" value="<?= date('Y') ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label>Dias de Feriado no mês (Opcional, separados por vírgula)</label>
            <input type="text" name="feriados" class="form-control" placeholder="ex: 7, 25">
            <small style="color:var(--text-secondary)">Dias listados ficarão com fundo de Feriado.</small>
        </div>

        <div class="form-group">
            <label>Pontos Facultativos (Opcional, separados por vírgula)</label>
            <input type="text" name="pontos_facultativos" class="form-control" placeholder="ex: 24, 31">
            <small style="color:var(--text-secondary)">Dias listados ficarão com fundo de Ponto Facultativo.</small>
        </div>

        <button type="submit" class="btn btn-primary" style="width:100%; margin-top:1rem; font-size:1.1rem; padding: 0.75rem;">Gerar Folha de Ponto</button>
    </form>
</div>
<?= $this->endSection() ?>
