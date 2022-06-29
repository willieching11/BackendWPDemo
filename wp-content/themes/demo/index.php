<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="container mt-50">
	<div class="row">
		<div class="col-12 mb-50 text-center">
			<h1 class="text-primary font-weight-bold mb-0">Basic Kitchen Sink</h1>
			<small>/index.php</small>
		</div>
	</div>
	<div class="row mb-100">
		<div class="col-12">
			<h4 class="font-weight-bold">Grid</h4>
		</div>
		<div class="col-12 col-md-3 bg-primary text-white p-10">.col-12 .col-md-3</div>
		<div class="col-12 col-md-3 bg-secondary text-white p-10">.col-12 .col-md-3</div>
		<div class="col-12 col-md-3 bg-warning text-white p-10">.col-12 .col-md-3</div>
		<div class="col-12 col-md-3 bg-danger text-white p-10">.col-12 .col-md-3</div>
	</div>
	
	<div class="row mb-100">
		<div class="col-12"><h4 class="font-weight-bold">Text</h4></div>

		<div class="col-12 col-md-6">
			<h1>H1 heading</h1>
		</div>
		<div class="col-12 col-md-6">
			<h3>H3 Heading</h3>
		</div>			
		<div class="col-12 col-md-6">
			<h2>H2 Heading</h2>
		</div>
		<div class="col-12 col-md-6">
			<h4>H4 Heading</h4>
		</div>			
		<div class="col-12 col-md-6">
			<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas obcaecati quisquam doloremque eveniet ipsum, suscipit quasi, sunt adipisci laborum placeat et! Optio accusamus consectetur placeat minus maxime, quas recusandae ipsam!</div>

			<div>
				<a href="#">Link</a>
				<a href="#" class="btn btn-primary">Button</a>
			</div>
		</div>
		<div class="col-12 col-md-6">
			<small>small text</small>
		</div>		
	</div>
	
	<div class="row mb-100">
	    <div class="col-12" id="accordions">
	        <h4 class="font-weight-bold">Accordions</h4>
	        <div id="accordion" role="tablist" aria-multiselectable="true">
	            <div class="card">
	                <div class="card-header" role="tab" id="headingOne">
	                    <h5 class="mb-0">
	                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Accordion One</a>
	                    </h5>
	                </div>
	                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
	                    Example Text 1
	                </div>
	            </div>

	            <div class="card">
	                <div class="card-header" role="tab" id="headingtwo">
	                    <h5 class="mb-0">
	                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsetwo" aria-expanded="false" aria-controls="collapsetwo">Accordion Two</a>
	                    </h5>
	                </div>
	                <div id="collapsetwo" class="collapse" role="tabpanel" aria-labelledby="headingtwo">
	                    Example Text 2
	                </div>
	            </div>


	        </div>
	    </div>
	</div>
	
	<!-- Modal -->
	<div class="row mb-100">
		<div class="col-12">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
			    Open Modal
			</button>
			<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				    <div class="modal-content">
				        <div class="modal-header">
				            <h5 class="modal-title">Modal title</h5>
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                <span aria-hidden="true">&times;</span>
				            </button>
				        </div>
				        <div class="modal-body">
				            <p>Modal body text goes here.</p>
				        </div>
				        <div class="modal-footer">
				            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				            <button type="button" class="btn btn-primary">Save changes</button>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>

</div>

<?php
get_footer();
