<?php
include 'Bdd.php';

// Vérifier que les données attendues sont présentes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryId  = $_POST['category'];
    $amount      = $_POST['amount'];
    $description = $_POST['description'];
    $expenseDate = $_POST['expense_date'];

    // Préparation et exécution de l'insertion
    $stmt = $pdo->prepare("INSERT INTO expenses (category_id, amount, description, expense_date) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$categoryId, $amount, $description, $expenseDate])) {
        header("Location: expenses.php"); // rediriger vers la liste des dépenses après insertion
        exit;
    } else {
        echo "Erreur lors de l'ajout de la dépense";
    }
}
?>
