<?php include 'inc/header.php'; ?>
    <h2 class="page-header">Create Job Listing</h2>
    <form method="post" action="create.php">
        <div class="form-group">
            <label>Company</label>
            <input type="text" class="form-control" name="company">
        </div>
        <div class="form-group">
            <label>Category</label>
            <select type="text" class="form-control" name="category_id">
                <option value="0">Choose Category</option>
<!--go in through the categories table and output them -->
                <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                    <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Job Title</label>
            <input type="text" class="form-control" name="job_title">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="form-group">
            <label>Location</label>
            <input type="text" class="form-control" name="location">
        </div>
        <div class="form-group">
            <label>Salary</label>
            <input type="text" class="form-control" name="salary">
        </div>
        <div class="form-group">
            <label>Contact User</label>
            <input type="text" class="form-control" name="contact_user">
        </div>
        <div class="form-group">
            <label>Contact Email</label>
            <input type="text" class="form-control" name="contact_email">
        </div>
        <br>
        <input type="submit" class="btn btn-primary" value="Submit" name="submit">
    </form>
    <br>
<?php include 'inc/footer.php'; ?>
