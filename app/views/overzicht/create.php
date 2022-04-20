<html>

<body>
    <div style="padding-left: 500px;
            margin-top: 75px;">
        <?= $data['Title']; ?>


        <form action="<?= URLROOT; ?>/overzicht/create" method="post">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="voornaam">voornaam</label>
                            <input type="text" name="voornaam" id="voornaam">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tussenvoegsel">tussenvoegsel</label>
                            <input type="text" name="tussenvoegsel" id="tussenvoegsel">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="achternaam">achternaam:</label>
                            <input type="text" name="achternaam" id="achternaam">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">email:</label>
                            <input type="text" name="email" id="email">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="category">Naam van klas:</label>
                            <select name="klas" id="klas">
                                <option value="">--- Kies een klas ---</option>
                                <?php echo $data['records'] ?>
                            </select>
                        </td>
                    </tr>

                    <td>
                        <input type="hidden" name="studentNr">
                    </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Verzenden">
                        </td>
                    </tr>

                </tbody>
            </table>
        </form>
    </div>
</body>

</html>