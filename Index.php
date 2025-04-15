<?php 
    include("View/Commun/Header.php"); 
    include("BDD/Bdd.php");
    include("Controller/insert.php");
    include("Controller/SelectCat.php");
    include("Controller/Diagramme.php");
?>
<br><br><br>

    <h2>Ajouter une dépense</h2>
    <form action="add_expense.php" method="POST">
        <label for="category">Catégorie :</label>
        <select name="category" id="category" required>
            <?php
            // Récupérer les catégories depuis la BDD
            $stmt = $pdo->query("SELECT id, name FROM categories");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['name']) . "</option>";
            }
            ?>
        </select>
        <br><br>
        
        <label for="amount">Montant :</label>
        <input type="number" step="0.01" name="amount" id="amount" required>
        <br><br>
        
        <label for="description">Description :</label>
        <textarea name="description" id="description"></textarea>
        <br><br>
        
        <label for="expense_date">Date :</label>
        <input type="date" name="expense_date" id="expense_date" required>
        <br><br>
        
        <input type="submit" value="Ajouter la dépense">
    </form>
    <br><br>
    <h2>Liste des dépenses</h2>
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Catégorie</th>
                <th>Montant</th>
                <th>Description</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr style="background-color: <?= htmlspecialchars($row['color']) ?>;">
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['category_name']) ?></td>
                <td><?= htmlspecialchars($row['amount']) ?></td>
                <td><?= htmlspecialchars($row['description']) ?></td>
                <td><?= htmlspecialchars($row['expense_date']) ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <br>
    <a href="formulaire.php">Ajouter une nouvelle dépense</a>
    <br><br>
    <a href="chart.php">Voir le diagramme circulaire</a>
    <br>
    <br>
    <h2>Diagramme des dépenses par catégorie</h2>
    <canvas id="pieChart" width="400" height="400"></canvas>
    <script>
        // Récupérer les données générées en PHP
        const labels = <?= json_encode($labels) ?>;
        const totals = <?= json_encode($totals) ?>;
        const colors = <?= json_encode($colors) ?>;

        const data = {
            labels: labels,
            datasets: [{
                data: totals,
                backgroundColor: colors,
                borderWidth: 1
            }]
        };

        const config = {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Répartition des dépenses'
                    }
                }
            }
        };

        const pieChart = new Chart(
            document.getElementById('pieChart'),
            config
        );
    </script>
    <br>
    <a href="expenses.php">Retour à la liste des dépenses</a>

<?php INCLUDE("View/Commun/Footer.php"); ?>