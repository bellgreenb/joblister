<?php include 'inc/header.php'; ?>
 

      <div class="jumbotron">
        <h1>Find A Job</h1>
        <form method="GET" action="index.php">
            <select name="category" class="form-control">
                <option value="0">Choose Category</option>
<!--go in through the categories table and output them -->
                <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                    <?php endforeach; ?>
            </select>
            <br>
            <input type="submit" class="btn btn-lg btn-success" value="FIND">
        </form>
      </div>

      <h3><?php echo $title; ?></h3>
<!-- the row marketing div is to separate the subheading sections more. -->
        <?php foreach($jobs as $job): ?>
      <div class="row marketing">
         <div class="col-md-10">
        <!--lets us see the jobs that are in the database-->
          <h4><?php echo $job->job_title; ?></h4>
          <p><?php echo $job->description; ?></p>
        </div>
        <div class="col-md-2">
            <a href="job.php?id=<?php echo $job->id; ?>" class="btn btn-secondary">View</a>
        </div>
      </div>
      <?php endforeach; ?>
       
       
        
      

      
<?php include 'inc/footer.php'; ?>