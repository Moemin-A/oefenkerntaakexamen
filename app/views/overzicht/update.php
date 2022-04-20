<div style="padding-left: 500px;
            margin-top: 75px;">

    <?= $data['title']; ?>



    <form action="<?= URLROOT; ?>/overzicht/update" method="POST">
        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="voornaam">Voornaam:</label>
                        <input type="text" name="voornaam" id="voornaam" value="<?= $data["row"]->voornaam?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="tussenvoegsel">tussenvoegsel</label>
                        <input type="text" name="tussenvoegsel" id="tussenvoegsel" value="<?= $data["row"]->tussenvoegsel ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="achternaam">achternaam:</label>
                        <input type="text" name="achternaam" id="achternaam" value="<?= $data["row"]->achternaam ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">email:</label>
                        <input type="text" name="email" id="email" value="<?= $data["row"]->email ?>">
                    </td>
                </tr>
                <td>
                        <label for="category">Naam van klas:</label>
                        <select name="klas" id="klas" required>
                            <option value="<?= $data["row"]->klas ?>">--- Kies een klas: ---</option>
                            <?php echo $data['records'] ?>
                        </select>
                    </td>

                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?= $data["row"]->studentNr ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="verzenden">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>