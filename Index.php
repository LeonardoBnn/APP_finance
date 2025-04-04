<?php INCLUDE("View/Commun/Header.php"); ?>
<br><br><br>
    <h1>Utilisez ce formulaire pour ajouter une dépense.</h1>
    <section id="Form">
        <form action="Controller/AjoutDepense.php" method="POST">
            Montant de la dépense :<input type="text" name="Montant">
            <br>
            Type de Dépense :
            <select name="Cat_id">
                <?php INCLUDE("Controller/SelectLimite.php");?>
                <?php foreach($limites as $limites){?>
                <option value="<?php echo $limites['ID'];?>">
                    <?php echo $limites['Libelle']; ?>
                </option>
                <?php }?>
            </select>
            <br><br>
            <input type="submit" name="ajouter" value="ajouter">
        </form>
    </section>

<?php INCLUDE("View/Commun/Footer.php"); ?>