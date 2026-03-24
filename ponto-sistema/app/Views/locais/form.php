<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="page-header">
    <h1><?= isset($local) ? 'Editar Local' : 'Novo Local' ?></h1>
    <a href="<?= base_url('locais') ?>" class="btn">Voltar</a>
</div>

<div class="card">
    <form action="<?= isset($local) ? base_url('locais/atualizar/'.$local->id) : base_url('locais/salvar') ?>" method="POST">
        <div class="form-row">
            <div class="form-group">
                <label>Secretaria</label>
                <input type="text" name="secretaria" class="form-control" value="<?= isset($local) ? esc($local->secretaria) : '' ?>" required>
            </div>
            <div class="form-group">
                <label>Escola / Local</label>
                <input type="text" name="escola_local" class="form-control" value="<?= isset($local) ? esc($local->escola_local) : '' ?>" required>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Salvar Local</button>
    </form>
</div>
<?= $this->endSection() ?>
