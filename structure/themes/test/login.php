<? /* App Login Page Template
------------------------------
** Here we go */

echo $page->get_header();?>

    <div class="container-fluid">
    	<div class="row-fluid">
    		<div class="span12">
	    		<? $user->login_form(); ?>
    		</div><!-- /span10 -->	
    	</div><!-- /row -->	    		
    </div> <!-- /container -->

<? echo $page->get_footer();?>