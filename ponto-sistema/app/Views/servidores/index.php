<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="page-header">
    <h1>Servidores</h1>
    <a href="<?= base_url('servidores/novo') ?>" class="btn btn-primary">Adicionar Servidor</a>
</div>

<div class="card">
    <div class="table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Local</th>
                    <th>C.H. Semanal</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($servidores as $s): ?>
                <tr>
                    <td><?= esc($s->matricula) ?></td>
                    <td><?= esc($s->nome) ?></td>
                    <td><?= esc($s->cargo_funcao) ?></td>
                    <td><?= esc($s->escola_local ?? 'N/A') ?></td>
                    <td><?= esc($s->ch_semanal) ?></td>
                    <td>
                        <a href="<?= base_url('servidores/editar/'.$s->id) ?>" class="btn btn-primary">Editar</a>
                        <a href="<?= base_url('servidores/excluir/'.$s->id) ?>" class="btn btn-danger" onclick="return confirm('Excluir este servidor?')">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($servidores)): ?>
                <tr><td colspan="6">Nenhum servidor cadastrado.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
