<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="page-header">
    <h1>Gerar Folha de Ponto</h1>
</div>

<div class="card" style="max-width: 600px;">
    <form action="<?= base_url('folha/imprimir') ?>" method="POST" target="_blank">
        
        <div class="form-group">
            <label>Tipo de Livro Ponto</label>
            <div style="display: flex; gap: 20px; margin-bottom: 10px;">
                <label style="display: flex; align-items: center; gap: 5px; cursor: pointer;">
                    <input type="radio" name="tipo_folha" value="apoio" checked onchange="filterServidores('apoio')"> Quadro de Apoio
                </label>
                <label style="display: flex; align-items: center; gap: 5px; cursor: pointer;">
                    <input type="radio" name="tipo_folha" value="docente" onchange="filterServidores('docente')"> Docente (Professor)
                </label>
            </div>
        </div>

        <div class="form-group">
            <label>Selecione o Servidor</label>
            <select name="servidor_id" id="servidor_id" class="form-control" required>
                <option value="">-- Selecione --</option>
                <option value="todos">TODOS OS SERVIDORES DESTE TIPO</option>
                <?php foreach($servidores as $s): ?>
                    <option value="<?= $s->id ?>" data-tipo="<?= $s->tipo ?>"><?= esc($s->nome) ?> (<?= esc($s->matricula) ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>

        <script>
            function filterServidores(tipo) {
                const select = document.getElementById('servidor_id');
                const options = select.options;
                
                // Reset selection
                select.value = "";

                for (let i = 0; i < options.length; i++) {
                    const option = options[i];
                    const dataTipo = option.getAttribute('data-tipo');
                    
                    if (option.value === "" || option.value === "todos") {
                        option.style.display = "block";
                    } else if (dataTipo === tipo) {
                        option.style.display = "block";
                    } else {
                        option.style.display = "none";
                    }
                }
            }
            // Initial filter
            window.onload = () => filterServidores('apoio');
        </script>

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
