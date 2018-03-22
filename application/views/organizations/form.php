<?php
$errors = validation_errors();
if (!empty($errors)) {
    echo $errors . '<hr/>';
}
?>

<?php echo form_open(isset($item) ? site_url('organizations/edit/'. $item['id']) : site_url('organizations/create'), array('id' => 'create_frm', 'name' => 'create_frm', 'class' => 'form-horizontal')); ?>
    <div class="row">
        <div class="full-row">
            <div class="col-25">
                <label for="fname">Name</label>
            </div>
            <div class="col-75">
                <input required type="text" name="name" placeholder="Name" value="<?= isset($item) ? $item['name'] : '' ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="full-row">
            <div class="col-25">
                <label for="lname">Position</label>
            </div>
            <div class="col-75">
                <input required type="text" name="position" placeholder="Position" value="<?= isset($item) ? $item['position'] : '' ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="full-row">
            <div class="col-25">
                <label for="country">Parent</label>
            </div>
            <div class="col-75">
                <select required name="parent">
                    <option value="">Select Parent</option>
                    <?php foreach ($organizationList as $single): ?>
                        <option <?= isset($item) && $item['parent'] == $single['id'] ? 'selected' : '' ?> value="<?= $single['id'] ?>"><?= $single['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="full-row">
            <input type="submit" value="Submit">
        </div>
    </div>

<?php echo form_close() ?>