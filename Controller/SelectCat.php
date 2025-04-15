<?php
include 'Bdd.php';

// Requête pour récupérer les dépenses avec leur catégorie
$stmt = $pdo->query("
    SELECT e.id, e.amount, e.description, e.expense_date, c.name AS category_name, c.color 
    FROM expenses e
    JOIN categories c ON e.category_id = c.id
    ORDER BY e.expense_date DESC
");
?>