<?php
function calculerFacture(int $age, float $tarifBase): float
{
    $tarifFinal = $tarifBase;
    if ($age > 65) {
        $tarifFinal = $tarifBase * 1.20;
    }
    return $tarifFinal;
}
function getBadge(string $code): array
{
    switch ($code) {
        case 'cardio':
            return ['libelle' => 'Cardiologie', 'classe' => 'badge-cardio'];
        case 'derma':
            return ['libelle' => 'dermatologue', 'classe' => 'badge-derma'];
        case 'pedia':
            return ['libelle' => 'Pédiatrie', 'classe' => 'badge-pedia'];
        default:
            return ['libelle' => 'Service inconnu', 'classe' => 'badge-inconnu'];
    }}
    function filtrerUrgences(array $patients): array
    {
        return array_values(
            array_filter(
                $patients,
                fn(array $p): bool => $p['urgence'] === 'rouge'
            )
        );}
    function getLibelleUrgence(string $code): string
        {
        switch ($code) {
            case 'rouge':
                return 'Urgence absolue';
            case 'orange':
                return 'Urgence relative';
            case 'vert':
                return 'Consultation standard';
            default:
                return 'Niv 'urgence inconnu';
        }
        }
        ?>



    

















