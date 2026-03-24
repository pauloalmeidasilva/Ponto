<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="page-header">
    <h1>Secretarias e Escolas</h1>
    <a href="<?= base_url('locais/novo') ?>" class="btn btn-primary">Adicionar Local</a>
</div>

<div class="card">
    <div class="table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Secretaria</th>
                    <th>Escola / Local</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($locais as $local): ?>
                <tr>
                    <td><?= $local->id ?></td>
                    <td><?= esc($local->secretaria) ?></td>
                    <td><?= esc($local->escola_local) ?></td>
                    <td>
                        <a href="<?= base_url('locais/editar/'.$local->id) ?>" class="btn btn-primary">Editar</a>
                        <a href="<?= base_url('locais/excluir/'.$local->id) ?>" class="btn btn-danger" onclick="return confirm('Tem certeza?')">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($locais)): ?>
                <tr><td colspan="4">Nenhum local cadastrado.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
