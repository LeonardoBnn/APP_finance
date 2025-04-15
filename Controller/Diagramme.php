<?php
include 'Bdd.php';

// Récupérer la somme des montants par catégorie
$stmt = $pdo->query("
    SELECT c.name AS category_name, c.color, SUM(e.amount) AS total
    FROM expenses e
    JOIN categories c ON e.category_id = c.id
    GROUP BY c.id
");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Préparer les tableaux pour Chart.js
$labels = [];
$totals = [];
$colors = [];

foreach ($data as $row) {
    $labels[] = $row['category_name'];
    $totals[] = $row['total'];
    $colors[] = $row['color'];
}
?>