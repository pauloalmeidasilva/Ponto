<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Folha de Ponto -
        <?= esc($servidor->nome)?> -
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
            padding: 5.5px 4px;
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
            min-height: 50px;
        }

        .footer strong {
            font-size: 10px;
        }

        .asterisks {
            font-size: 10px;
            letter-spacing: 2px;
        }
    </style>
</head>

<body onload="window.print()">
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
        <?= $mes_nome?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Ano:
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

</body>

</html>