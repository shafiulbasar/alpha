<?php echo  get_page_template(); ?>
<?php
/*
Template Name: product template
*/
?>


<?php get_header(); ?>
<body <?php body_class(array("first_class","second_class")); ?>>
<?php get_template_part("/common-template/hero"); ?>

<?php get_template_part("/page-template/product/emploeeInfo"); ?>

<?php get_footer(); ?>