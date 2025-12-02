<div class="form-container">
<h2>Edit Module</h2>
<form action="" method="post">
    <input type="hidden" name="moduleid" value="<?= $module['id'] ?>">
    <label for="moduleName">Module Name</label><br/>
    <input type="text" name="moduleName" value="<?= htmlspecialchars($module['moduleName'], ENT_QUOTES, 'UTF-8') ?>" required><br/>
    <input type="submit" value="Save">
</form>
</div>