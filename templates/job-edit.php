<?php include 'inc/header.php'; ?>
    <h2 class="page-header">Edit Job Listing</h2>
    <form method="post" action="edit.php?id=<?php echo $job->id; ?>">
        <div class="form-group">
            <label>Company</label>
            <input type="text" class="form-control" name="company" value="<?php echo $job->company; ?>">
        </div>
        <div class="form-group">
            <label>Category</label>
            <select type="text" class="form-control" name="category_id">
                <option value="0">Choose Category</option>
<!--go in through the categories table and output them -->
                <?php foreach($categories as $category): ?>
                <!--if the current iteration of the category is what the current category id is, then its gonna say selected, which will make that stay the default choice when editing. -->
                     <?php if($job->category_id == $category->id) : ?>
                        <option value="<?php echo $category->id; ?>" selected><?php echo $category->name; ?></option>
                    <?php else: ?>
                        <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                <?php endif; ?>
                    <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Job Title</label>
            <input type="text" class="form-control" name="job_title" value="<?php echo $job->job_title; ?>">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description"><?php echo $job->description; ?></textarea>
        </div>
        <div class="form-group">
            <label>Location</label>
            <input type="text" class="form-control" name="location" value="<?php echo $job->location; ?>">
        </div>
        <div class="form-group">
            <label>Salary</label>
            <input type="text" class="form-control" name="salary" value="<?php echo $job->salary; ?>">
        </div>
        <div class="form-group">
            <label>Contact User</label>
            <input type="text" class="form-control" name="contact_user" value="<?php echo $job->contact_user; ?>">
        </div>
        <div class="form-group">
            <label>Contact Email</label>
            <input type="text" class="form-control" name="contact_email" value="<?php echo $job->contact_email; ?>">
        </div>
        <br>
        <input type="submit" class="btn btn-primary" value="Submit" name="submit">
    </form>
    <br>
<?php include 'inc/footer.php'; ?>
