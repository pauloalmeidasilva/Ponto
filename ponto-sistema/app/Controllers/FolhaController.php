<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Servidor;
use App\Models\Folha;

class FolhaController extends BaseController
{
    protected $servidorModel;
    protected $folhaModel;

    public function __construct()
    {
        $this->servidorModel = new Servidor();
        $this->folhaModel = new Folha();
    }

    public function index()
    {
        $data['servidores'] = $this->servidorModel->getAllWithLocal();
        return view('folha/index', $data);
    }

    public function imprimir()
    {
        $servidor_id = $this->request->getPost('servidor_id');
        $mes = (int)$this->request->getPost('mes');
        $ano = (int)$this->request->getPost('ano');

        // Feriados e Pontos Facultativos received as comma separated or array
        $feriados_input = $this->request->getPost('feriados');
        $facultativos_input = $this->request->getPost('pontos_facultativos');

        $feriados = array_map('trim', explode(',', $feriados_input ?? ''));
        $pontos_facultativos = array_map('trim', explode(',', $facultativos_input ?? ''));

        if ($servidor_id === 'todos') {
            $servidores = $this->servidorModel->getAllWithLocal();
        }
        else {
            $servidor = $this->servidorModel->getServidorWithLocal($servidor_id);
            $servidores = $servidor ? [$servidor] : [];
        }

        if (empty($servidores)) {
            return redirect()->back()->with('error', 'Selecione um Servidor válido.');
        }

        // Month names
        $meses = [
            1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril', 5 => 'Maio', 6 => 'Junho',
            7 => 'Julho', 8 => 'Agosto', 9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'
        ];

        // Calculate days in month
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

        $diasLista = [];
        $diasSemana = [
            0 => 'D', // Sunday in PHP date('w') is 0
            1 => '2ª',
            2 => '3ª',
            3 => '4ª',
            4 => '5ª',
            5 => '6ª',
            6 => 'S' // Saturday
        ];

        for ($dia = 1; $dia <= $daysInMonth; $dia++) {
            $dateTimestamp = mktime(0, 0, 0, $mes, $dia, $ano);
            $w = date('w', $dateTimestamp); // 0 (Sunday) to 6 (Saturday)

            $diasLista[$dia] = [
                'dia' => $dia,
                'semana' => $diasSemana[$w],
                'is_weekend' => ($w == 0 || $w == 6),
                'is_domingo' => ($w == 0),
                'is_sabado' => ($w == 6),
                'is_feriado' => in_array((string)$dia, $feriados),
                'is_ponto_facultativo' => in_array((string)$dia, $pontos_facultativos),
            ];
        }

        $data = [
            'servidores' => $servidores,
            'mes_numero' => str_pad($mes, 2, '0', STR_PAD_LEFT),
            'mes_nome' => $meses[$mes] ?? '',
            'ano' => $ano,
            'dias' => $diasLista
        ];

        return view('folha/imprimir', $data);
    }
}