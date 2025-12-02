<h2>Add a new question</h2>

<div class="form-container">
  <form action="" method="post" enctype="multipart/form-data" novalidate>
    <label for="questiontext">Type question:</label>
    <textarea name="questiontext" rows="4" cols="40" required></textarea>

    <label for="fileToUpload">Attach an image (optional)</label>
    <input type="file" name="fileToUpload" accept="image/*">

    <label for="users">Submitted by</label>
    <select name="users" required>
        <option value="">select a user</option>
        <?php foreach($users as $user): ?>
            <option value="<?=htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8')?>">
            <?=htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8')?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="modules">Module</label>
    <select name="modules" required>
        <option value="">select a module</option> 
        <?php foreach($modules as $module): ?>
            <option value="<?=htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8')?>">
            <?=htmlspecialchars($module['moduleName'], ENT_QUOTES, 'UTF-8')?>
            </option>
        <?php endforeach; ?>
    </select>

    <div class="form-actions">
      <input type="submit" name="submit" value="Add">
    </div>
  </form>
</div>
