<?php
require_once './config.php';
require_once './fonctions.php';
$patients = [
    ['id' => 1, 'nom' => 'Sami',    'age' => 70, 'service' => 'CARDIO', 'urgence' => 'rouge'],
    ['id' => 2, 'nom' => 'Amel',    'age' => 34, 'service' => 'DERMA',  'urgence' => 'vert'],
    ['id' => 3, 'nom' => 'Yassine', 'age' => 8,  'service' => 'PEDIA',  'urgence' => 'orange'],
    ['id' => 4, 'nom' => 'Ines',    'age' => 66, 'service' => 'CARDIO', 'urgence' => 'rouge'],
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des patients</title>
    <link rel="stylesheet" href="styles/design.css">
</head>
<body>
    <h1>Liste des patients</h1>

    <div class="grille">
        <?php foreach ($patients as $p): ?>
            <?php
                $badge = getBadgeService($p['service']);
                $libelleUrgence = getLibelleUrgence($p['urgence']);
                const TARIF_BASE = 50;
                $facture = calculerFacture($p['age'], TARIF_BASE);
            ?>
            <article class="carte urgence<?= $p['urgence'] ?>">
                <h2><?php= $p['nom'] ?></h2>
                <p><strong>Num patient :</strong> <?= $p['id'] ?></p>
                <p><strong>Âge :</strong> <?= $p['age'] ?> ans</p>

                <span class="badge <?= $badge['classe'] ?>">
                    <?= $badge['libelle'] ?>
                </span>

                <p><strong>Urgence :</strong> <?= $libelleUrgence ?></p>
                <p><strong>Facture estimée :</strong> <?= $facture ?> tnss</p>
            </article>
        <?php endforeach; ?>
    </div>
    <section class="recapitulatif">
    <h2>Récapitulatif</h2>

    <p><strong>Nombre total de patients :</strong> <?= count($patients) ?></p>

    <h3>Patients en urgence absolue :</h3>
    <ul>
        <?php foreach ($urgencesAbsolues as $u): ?>
            <?php $b = getBadgeService($u['service']); ?>
            <li><?= $u['nom'] ?> <?= $b['libelle'] ?></li>
        <?php endforeach; ?>
    </ul>
</section>
</body>
</html>
$facture = calculerFacture($p['age'], TARIF_BASE);