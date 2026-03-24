<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="page-header">
    <h1><?= isset($servidor) ? 'Editar Servidor' : 'Novo Servidor' ?></h1>
    <a href="<?= base_url('servidores') ?>" class="btn">Voltar</a>
</div>

<div class="card">
    <form action="<?= isset($servidor) ? base_url('servidores/atualizar/'.$servidor->id) : base_url('servidores/salvar') ?>" method="POST">
        <div class="form-row">
            <div class="form-group">
                <label>Matrícula</label>
                <input type="text" name="matricula" class="form-control" value="<?= isset($servidor) ? esc($servidor->matricula) : '' ?>">
            </div>
            <div class="form-group">
                <label>Nome Completo</label>
                <input type="text" name="nome" class="form-control" value="<?= isset($servidor) ? esc($servidor->nome) : '' ?>" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Cargo / Função</label>
                <input type="text" name="cargo_funcao" class="form-control" value="<?= isset($servidor) ? esc($servidor->cargo_funcao) : '' ?>">
            </div>
            <div class="form-group">
                <label>RG</label>
                <input type="text" name="rg" class="form-control" value="<?= isset($servidor) ? esc($servidor->rg) : '' ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Carga Horária Semanal (ex: 40hs)</label>
                <input type="text" name="ch_semanal" class="form-control" value="<?= isset($servidor) ? esc($servidor->ch_semanal) : '' ?>">
            </div>
            <div class="form-group">
                <label>Horário Padrão (ex: 08:00 ás 17:00)</label>
                <input type="text" name="horario_padrao" class="form-control" value="<?= isset($servidor) ? esc($servidor->horario_padrao) : '' ?>">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label>Local (Escola/Secretaria)</label>
                <select name="local_id" class="form-control">
                    <option value="">-- Selecione --</option>
                    <?php foreach($locais as $local): ?>
                        <option value="<?= $local->id ?>" <?= (isset($servidor) && $servidor->local_id == $local->id) ? 'selected' : '' ?>>
                            <?= esc($local->secretaria) ?> - <?= esc($local->escola_local) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Plantão</label>
                <input type="text" name="plantao" class="form-control" value="<?= isset($servidor) ? esc($servidor->plantao) : '' ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Estudante</label>
                <input type="text" name="estudante" class="form-control" value="<?= isset($servidor) ? esc($servidor->estudante) : '' ?>">
            </div>
            <div class="form-group">
                <label>Almoço</label>
                <input type="text" name="almoco" class="form-control" value="<?= isset($servidor) ? esc($servidor->almoco) : '' ?>">
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Salvar Servidor</button>
    </form>
</div>
<?= $this->endSection() ?>
