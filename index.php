<?php include_once 'config/init.php'; ?>

<?php
//create the job object
$job = new Job;

$template = new Template('templates/frontpage.php'); 

//if theres a category in the url, we set GET category to it. if not, the variable is set to null.
$category = isset($_GET['category']) ? $_GET['category']:null;

//test for the category isset
if($category){
    $template->jobs = $job->getByCategory($category);
    $template->title = 'Jobs In ' . $job->getCategory($category)->name;
} else {//else no category: keep loading what you normally load.
    $template->title = 'Latest Jobs';
    $template->jobs = $job->getAllJobs();
}


$template->categories = $job->getCategories();

echo $template;
?>