<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Folha de Ponto -
        <?= $mes_numero?>/
        <?= $ano?>
    </title>
    <style>
        @page {
            size: A4 portrait;
            margin: 5mm;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            margin: 0;
            padding: 0;
            color: #000;
            line-height: 1.3;
        }

        .page {
            page-break-after: always;
            padding: 10px;
            position: relative;
            min-height: 98vh;
            display: flex;
            flex-direction: column;
        }

        .page:last-child {
            page-break-after: auto;
        }

        .header {
            text-align: center;
            margin-bottom: 12px;
        }

        .header h1,
        .header h2,
        .header h3 {
            margin: 2px 0;
            font-weight: bold;
        }

        .header h1 {
            font-size: 14px;
        }

        .header h2 {
            font-size: 12px;
        }

        .header h3 {
            font-size: 12px;
        }

        .competencia {
            text-align: center;
            font-weight: bold;
            font-size: 12px;
            margin-bottom: 10px;
            padding: 4px 0;
        }

        .box-dados {
            border: 1px solid #000;
            margin-bottom: 10px;
            padding: 5px;
            background: #fff;
        }

        .box-dados-title {
            font-weight: bold;
            font-size: 11px;
            margin-bottom: 5px;
            text-align: center;
            border-bottom: 1px solid #555;
            padding-bottom: 3px;
        }

        .box-dados .row {
            display: flex;
            margin-bottom: 4px;
            justify-content: space-between;
        }

        .box-dados .item {
            margin-right: 5px;
        }

        .box-dados strong {
            text-transform: uppercase;
            font-size: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 4px 4px;
            text-align: center;
        }

        th {
            background-color: #f1f1f1;
            font-size: 10px;
            font-weight: bold;
        }

        .col-dia {
            width: 25px;
        }

        .col-sem {
            width: 30px;
        }

        .col-hora {
            width: 65px;
        }

        .col-ass {
            width: auto;
        }

        .col-obs {
            width: 120px;
        }

        .row-weekend {
            background-color: #eaeaea;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .text-block {
            font-weight: bold;
            font-size: 10px;
        }

        .footer {
            margin-top: 10px;
            border: 1px solid #000;
            padding: 5px;
            min-height: 40px;
        }

        .footer strong {
            font-size: 10px;
        }

        .signature-section {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            padding-right: 20px;
        }

        .signature-box {
            border-top: 1px solid #000;
            width: 250px;
            text-align: center;
            padding-top: 5px;
            margin-top: 30px;
        }

        .signature-box p {
            margin: 0;
            font-size: 10px;
            font-weight: bold;
        }

        .asterisks {
            font-size: 10px;
            letter-spacing: 2px;
        }
    </style>
</head>

<body onload="window.print()">
    <?php foreach ($servidores as $servidor): ?>
    
    <?php if (($tipo_folha ?? 'apoio') === 'docente'): ?>
    <!-- LAYOUT DOCENTE -->
    <div class="page docente-page">
        <style>
            .docente-page { font-size: 9px; }
            .docente-header { text-align: center; border-bottom: 2px solid #000; margin-bottom: 10px; }
            .docente-header h1 { font-size: 14px; margin: 0; }
            .docente-header h2 { font-size: 11px; margin: 2px 0; }
            
            .info-grid { display: grid; grid-template-columns: 2fr 1fr 1fr; border: 1px solid #000; margin-bottom: 10px; }
            .info-item { border: 0.5px solid #000; padding: 2px 5px; }
            .info-label { font-weight: bold; text-transform: uppercase; font-size: 8px; display: block; }
            
            .main-content { display: flex; gap: 10px; flex: 1; }
            .freq-table { flex: 3; }
            .side-tables { flex: 1; display: flex; flex-direction: column; gap: 10px; }
            
            .freq-table table { width: 100%; border-collapse: collapse; border: 2px solid #000; }
            .freq-table th, .freq-table td { border: 1px solid #000; padding: 2px; text-align: center; font-size: 8px; }
            .freq-table th { background: #f0f0f0; }
            
            .side-table { border: 1px solid #000; }
            .side-table-title { background: #000; color: #fff; text-align: center; font-weight: bold; padding: 2px; font-size: 9px; }
            .side-table table { width: 100%; border-collapse: collapse; }
            .side-table th, .side-table td { border: 1px solid #000; padding: 2px; text-align: center; font-size: 7px; }
            
            .docente-footer { margin-top: auto; display: flex; justify-content: space-between; padding-top: 20px; }
            .docente-sig-box { border-top: 1px solid #000; width: 45%; text-align: center; padding-top: 5px; }
        </style>
        
        <div class="docente-header">
            <h1>PREFEITURA MUNICIPAL DA ESTÂNCIA DE CAMPOS DO JORDÃO</h1>
            <h2>SECRETARIA MUNICIPAL DE EDUCAÇÃO - <?= esc($servidor->escola_local ?? 'UNIDADE ESCOLAR') ?></h2>
            <div style="background: #f0f0f0; font-weight: bold; padding: 3px; border: 1px solid #000;">FOLHA DE FREQUÊNCIA</div>
        </div>

        <div class="info-grid">
            <div class="info-item"><span class="info-label">Professor:</span><strong><?= esc($servidor->nome) ?></strong></div>
            <div class="info-item"><span class="info-label">RG:</span><?= esc($servidor->rg) ?></div>
            <div class="info-item"><span class="info-label">MTR:</span><?= esc($servidor->matricula) ?></div>
            
            <div class="info-item"><span class="info-label">Situação:</span><?= esc($servidor->cargo_funcao) ?></div>
            <div class="info-item"><span class="info-label">Jornada:</span>Básica</div>
            <div class="info-item"><span class="info-label">C/H:</span><?= esc($servidor->ch_semanal) ?></div>
            
            <div class="info-item" style="grid-column: span 2;"><span class="info-label">Sede de Controle:</span><?= esc($servidor->escola_local) ?></div>
            <div class="info-item"><span class="info-label">Mês/Ano:</span><?= $mes_nome ?> / <?= $ano ?></div>
        </div>

        <div class="main-content">
            <div class="freq-table">
                <table>
                    <thead>
                        <tr>
                            <th rowspan="2" style="width: 100px;">ASSINATURAS</th>
                            <th colspan="2">DIAS</th>
                            <th colspan="3">JORNADA UE LOCAL</th>
                            <th colspan="4">AUSÊNCIAS</th>
                        </tr>
                        <tr>
                            <th>Mês</th>
                            <th>Sem</th>
                            <th>Diária</th>
                            <th>Subst</th>
                            <th>Total</th>
                            <th>H/A</th>
                            <th>Local</th>
                            <th>Outras</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dias as $d): 
                            $is_blocked = ($d['is_domingo'] || $d['is_sabado'] || $d['is_feriado'] || $d['is_ponto_facultativo']);
                        ?>
                        <tr>
                            <td style="height: 15px;"><?= $is_blocked ? '****************' : '' ?></td>
                            <td><?= str_pad($d['dia'], 2, '0', STR_PAD_LEFT) ?></td>
                            <td><?= $d['semana'] ?></td>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <div class="side-tables">
                <div class="side-table">
                    <div class="side-table-title">HORÁRIO</div>
                    <table>
                        <tr><th>D</th><th>S</th><th>T</th><th>Q</th><th>Q</th><th>S</th><th>S</th></tr>
                        <tr><td>M</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                        <tr><td>T</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                    </table>
                </div>
                
                <div class="side-table">
                    <div class="side-table-title">RESUMO FINAL</div>
                    <table style="text-align: left;">
                        <tr><td>Jornada:</td><td style="width: 30px;"></td></tr>
                        <tr><td>Projetos:</td><td></td></tr>
                        <tr><td><strong>TOTAL:</strong></td><td></td></tr>
                    </table>
                </div>

                <div class="side-table" style="flex: 1; min-height: 100px;">
                    <div class="side-table-title">ANOTAÇÕES</div>
                    <div style="padding: 5px;"></div>
                </div>
            </div>
        </div>

        <div class="footer" style="margin-top: 10px; min-height: 30px; border: 1px solid #000; padding: 2px;">
            <strong>OBSERVAÇÕES:</strong>
        </div>

        <div class="docente-footer">
            <div class="docente-sig-box">
                <p>Oficial de Escola</p>
            </div>
            <div class="docente-sig-box">
                <p>Diretor de Escola</p>
            </div>
        </div>
    </div>

    <?php else: ?>
    <!-- LAYOUT APOIO -->
    <div class="page">
        <div class="header">
            <h1>PREFEITURA MUNICIPAL DA ESTÂNCIA DE CAMPOS DO JORDÃO/SP</h1>
            <h2>
                <?= esc($servidor->secretaria ?? 'SECRETARIA MUNICIPAL DE EDUCAÇÃO')?>
            </h2>
            <h3>
                <?= esc($servidor->escola_local ?? 'ESCOLA NÃO INFORMADA')?>
            </h3>
            <h3>REGISTRO DE PONTO - QUADRO DE APOIO</h3>
        </div>

        <div class="competencia">
            Mês:
            <?= $mes_nome?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            Ano:
            <?= $ano?>
        </div>

        <div class="box-dados">
            <div class="box-dados-title">DADOS DO SERVIDOR</div>
            <div class="row">
                <div class="item" style="flex:1"><strong>MATR.:</strong>
                    <?= esc($servidor->matricula)?>
                </div>
                <div class="item" style="flex:2"><strong>NOME:</strong>
                    <?= esc($servidor->nome)?>
                </div>
                <div class="item" style="flex:1"><strong>RG:</strong>
                    <?= esc($servidor->rg)?>
                </div>
                <div class="item" style="flex:2"><strong>CARGO/FUNÇÃO:</strong>
                    <?= esc($servidor->cargo_funcao)?>
                </div>
            </div>
            <div class="row">
                <div class="item" style="flex:1"><strong>HORÁRIO:</strong>
                    <?= esc($servidor->horario_padrao)?>
                </div>
                <div class="item" style="flex:1"><strong>ALMOÇO:</strong>
                    <?= esc($servidor->almoco)?>
                </div>
                <div class="item" style="flex:1"><strong>C. H. SEMANAL:</strong>
                    <?= esc($servidor->ch_semanal)?>h
                </div>
                <div class="item" style="flex:1"><strong>PLANTÃO:</strong>
                    <?= esc($servidor->plantao)?>
                </div>
                <div class="item" style="flex:1"><strong>ESTUDANTE:</strong>
                    <?= esc($servidor->estudante)?>
                </div>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th class="col-dia">DIA</th>
                    <th class="col-sem">SEM</th>
                    <th class="col-hora">ENTRADA</th>
                    <th class="col-hora">SAÍDA</th>
                    <th class="col-obs">OBSERVAÇÃO</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dias as $d):
        $tipo_dia = '';
        $is_blocked = false;
        if ($d['is_domingo']) {
            $tipo_dia = 'DOMINGO';
            $is_blocked = true;
        }
        else if ($d['is_sabado']) {
            $tipo_dia = 'SÁBADO';
            $is_blocked = true;
        }
        else if ($d['is_feriado']) {
            $tipo_dia = 'FERIADO';
            $is_blocked = true;
        }
        else if ($d['is_ponto_facultativo']) {
            $tipo_dia = 'PONTO FACULTATIVO';
            $is_blocked = true;
        }
?>
                <tr class="<?= $is_blocked ? 'row-weekend' : ''?>">
                    <td>
                        <?= $d['dia']?>
                    </td>
                    <td>
                        <?= $d['semana']?>
                    </td>

                    <?php if ($is_blocked): ?>
                    <td class="asterisks">***********************</td>
                    <td class="asterisks">***********************</td>
                    <td class="asterisks">
                        <?= $tipo_dia?>
                    </td>
                    <?php
        else: ?>
                    <td></td>
                    <td></td>
                    <td></td>
                    <?php
        endif; ?>
                </tr>
                <?php
    endforeach; ?>
            </tbody>
        </table>

        <div class="footer">
            <strong>OBSERVAÇÕES:</strong>
        </div>

        <div class="signature-section">
            <div class="signature-box">
                <p>Diretor</p>
                <p>(Assinatura e Carimbo)</p>
            </div>
            <div class="signature-box">
                <p>Secretário</p>
                <p>(Assinatura e Carimbo)</p>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php
endforeach; ?>

</body>

</html>