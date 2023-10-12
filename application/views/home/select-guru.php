<select name="guru" id="pil-guru" class="form-control" required>
    <option value="" disabled selected>Pilih guru</option>
    <?php foreach ($guru as $key) { ?>
        <option value="<?= $key->id_guru ?>"><?= $key->guru ?></option>
    <?php } ?>
</select>