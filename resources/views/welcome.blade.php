<h1>Halaman Welcome</h1>

<select>

    <?php foreach (config('sistem.helpdesk.status') as $key => $value): ?>
    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
    <?php endforeach; ?>

</select>


