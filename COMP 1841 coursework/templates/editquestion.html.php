<h2>Edit question</h2>

<div class="form-container">
  <form action="" method="post" enctype="multipart/form-data" novalidate>
    <input type="hidden" name="questionid" value="<?= htmlspecialchars($question['id'], ENT_QUOTES, 'UTF-8') ?>">

    <label for="questiontext">Edit question:</label>
    <textarea name="questiontext" rows="4" cols="40" required><?= htmlspecialchars($question['questiontext'], ENT_QUOTES, 'UTF-8') ?></textarea>

    <label for="fileToUpload">Replace image (optional)</label>
    <input type="file" name="fileToUpload" accept="image/*">

    <?php if (!empty($question['image'])): ?>
      <label>Current image</label>
      <div>
        <img src="../uploads/<?= htmlspecialchars($question['image'], ENT_QUOTES, 'UTF-8') ?>" alt="current image" style="max-height:100px;">
      </div>
    <?php endif; ?>

    <label for="users">Submitted by</label>
    <select name="users" required>
        <option value="">select a user</option>
        <?php foreach($users as $user): ?>
            <option value="<?=htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8')?>" <?php if($user['id'] == $question['userid']) echo 'selected'; ?>>
            <?=htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8')?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="modules">Module</label>
    <select name="modules" required>
        <option value="">select a module</option>
        <?php foreach($modules as $module): ?>
            <option value="<?=htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8')?>" <?php if($module['id'] == $question['moduleid']) echo 'selected'; ?>>
            <?=htmlspecialchars($module['moduleName'], ENT_QUOTES, 'UTF-8')?>
            </option>
        <?php endforeach; ?>
    </select>

    <div class="form-actions">
      <input type="submit" name="submit" value="Save">
    </div>
  </form>
</div>
