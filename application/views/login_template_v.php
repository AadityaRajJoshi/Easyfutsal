
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $meta['title']; ?></title>
        <meta name="keyword" content="<?php echo $meta['keyword']; ?>">
        <meta name="description" content="<?php echo $meta['description']; ?>">
        <meta name="viewport" content="width=device-width">
        <base href="<?php echo base_url(); ?>">
        <link rel="stylesheet" type="text/css" href="assets/build/style/login.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700,900&display=swap" rel="stylesheet">
    </head>
    <body class="luft-template-login luft-bg-primary">
        <div class="container">
            <?php 
                print_success_msg($success); 
                print_error_msg($error);
            ?>

            <?php if (validation_errors()): ?>
                <span class="form-err"><?php echo validation_errors(); ?></span>
            <?php endif; ?>               
        </div>
        <?php $this->load->view('common/' . $page); ?>       
    </body>
</html>
