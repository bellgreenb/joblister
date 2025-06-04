<?php include_once 'config/init.php'; ?>

<?php
//create the job object
$job = new Job;

//check to see if job form has been submitted
if(isset($_POST['submit'])) {
    //grab all the data from the form and put it into an array
    $data = array();
    $data['job_title'] = $_POST['job_title'];
    $data['company'] = $_POST['company'];
    $data['category_id'] = $_POST['category_id'];
    $data['description'] = $_POST['description'];
    $data['location'] = $_POST['location'];
    $data['salary'] = $_POST['salary'];
    $data['contact_user'] = $_POST['contact_user'];
    $data['contact_email'] = $_POST['contact_email'];

    //pass the array to a function in our class
    if($job->create($data)){
        //redirect without using the header function; so we make a helper file with a redirect function.
        redirect('index.php', 'Your job has been listed', 'success');
    } else {
        redirect('index.php', 'Something went wrong', 'error');

    }
}

$template = new Template('templates/job-create.php'); 

$template->categories = $job->getCategories();

echo $template;
?>