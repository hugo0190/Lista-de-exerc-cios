<?php

function ordenarConsultas($agenda) {
    usort($agenda, function ($consulta1, $consulta2) {
        return strcmp($consulta1['horario'], $consulta2['horario']);
    });

    return $agenda;
}

function localizarPaciente($agenda, $nomePaciente) {
    $resultado = [];

    foreach ($agenda as $consulta) {
        $nome = strtolower(trim($consulta['paciente']));
        $busca = strtolower(trim($nomePaciente));

        if ($nome === $busca) {
            $resultado[] = $consulta;
        }
    }

    return $resultado;
}

function especialidadesDaAgenda($agenda) {
    $resultado = [];

    foreach ($agenda as $consulta) {

        $especialidade = $consulta['especialidade'];

        if (isset($resultado[$especialidade])) {
            $resultado[$especialidade]++;
        } else {
            $resultado[$especialidade] = 1;
        }
    }

    return $resultado;
}

function quantidadeDePacientes($agenda) {
    $nomes = [];

    foreach ($agenda as $consulta) {
        $nomes[] = $consulta['paciente'];
    }

    return count(array_unique($nomes));
}

function existemHorariosRepetidos($agenda) {
    $horarios = [];

    foreach ($agenda as $consulta) {
        $horarios[] = $consulta['horario'];
    }

    return count($horarios) > count(array_unique($horarios));
}

function gerarResumoAgenda($agenda) {

    $agendaOrdenada = ordenarConsultas($agenda);

    $primeira = $agendaOrdenada[0];
    $ultima = $agendaOrdenada[count($agendaOrdenada) - 1];

    return [
        'quantidade_consultas' => count($agenda),
        'quantidade_pacientes' => quantidadeDePacientes($agenda),
        'especialidades' => especialidadesDaAgenda($agenda),
        'primeira_consulta' => $primeira,
        'ultima_consulta' => $ultima,
        'agenda_organizada' => $agendaOrdenada,
        'possui_horario_repetido' => existemHorariosRepetidos($agenda)
    ];
}


$agenda = [
    [
        'paciente' => 'Icaro',
        'especialidade' => 'Cardiologia',
        'data' => '2026-08-22',
        'horario' => '14:00'
    ],
    [
        'paciente' => 'Pedro',
        'especialidade' => 'Dermatologia',
        'data' => '2026-06-22',
        'horario' => '09:00'
    ],
    [
        'paciente' => 'Andrey',
        'especialidade' => 'Cardiologia',
        'data' => '2026-09-22',
        'horario' => '10:30'
    ]
];


echo "<pre>";

echo "RESUMO DA AGENDA:\n";
print_r(gerarResumoAgenda($agenda));

echo "\nCONSULTAS DA ANA:\n";
print_r(localizarPaciente($agenda, 'Ana'));

echo "</pre>";