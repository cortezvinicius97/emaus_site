<?php

namespace App\Services;

use PDO;

class LiturgiaService
{
    private ?PDO $pdo = null;

    private function db(): PDO
    {
        if ($this->pdo === null) {
            $path = database_path('liturgia.db');
            $this->pdo = new PDO("sqlite:$path", null, null, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        }
        return $this->pdo;
    }

    public function today(): ?object
    {
        $date = now()->format('d/m/Y');
        return $this->find($date);
    }

    public function find(string $date): ?object
    {
        $db = $this->db();

        $stmt = $db->prepare("SELECT * FROM liturgia WHERE data = ?");
        $stmt->execute([$date]);
        $row = $stmt->fetch();

        if (!$row) {
            return null;
        }

        $id = $row['id'];

        $leituras = $db->prepare("SELECT * FROM leituras WHERE liturgia_id = ?");
        $leituras->execute([$id]);
        $leiturasData = $leituras->fetchAll();

        $oracoes = $db->prepare("SELECT * FROM oracoes WHERE liturgia_id = ?");
        $oracoes->execute([$id]);
        $oracoesData = $oracoes->fetch();

        $antifonas = $db->prepare("SELECT * FROM antifonas WHERE liturgia_id = ?");
        $antifonas->execute([$id]);
        $antifonasData = $antifonas->fetch();

        $firstReading = null;
        $secondReading = null;
        $psalm = null;
        $evangelho = null;

        foreach ($leiturasData as $l) {
            switch ($l['tipo']) {
                case 'primeiraLeitura':
                    $firstReading = $l;
                    break;
                case 'segundaLeitura':
                    $secondReading = $l;
                    break;
                case 'salmo':
                    $psalm = $l;
                    break;
                case 'evangelho':
                    $evangelho = $l;
                    break;
            }
        }

        return (object) [
            'liturgia' => $row['liturgia'],
            'cor' => $row['cor'],
            'first_reading_text' => $firstReading['texto'] ?? null,
            'first_reading_ref' => $firstReading['referencia'] ?? null,
            'first_reading_title' => $firstReading['titulo'] ?? null,
            'second_reading_text' => $secondReading['texto'] ?? null,
            'second_reading_ref' => $secondReading['referencia'] ?? null,
            'second_reading_title' => $secondReading['titulo'] ?? null,
            'psalm_refrao' => $psalm['refrao'] ?? null,
            'psalm_verses' => $psalm['texto'] ?? null,
            'psalm_text' => $psalm['texto'] ?? $psalm['refrao'] ?? null,
            'psalm_ref' => $psalm['referencia'] ?? null,
            'psalm_title' => $psalm['titulo'] ?? null,
            'evangelho_text' => $evangelho['texto'] ?? null,
            'evangelho_ref' => $evangelho['referencia'] ?? null,
            'evangelho_title' => $evangelho['titulo'] ?? null,
        ];
    }
}
