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
	<div class="row mb-40">
		<div class="col-12">
			<h4 class="font-weight-bold">Grid</h4>
		</div>
		<div class="col-12 col-md-3 bg-primary text-white p-10">.col-12 .col-md-3</div>
		<div class="col-12 col-md-3 bg-secondary text-white p-10">.col-12 .col-md-3</div>
		<div class="col-12 col-md-3 bg-warning text-white p-10">.col-12 .col-md-3</div>
		<div class="col-12 col-md-3 bg-danger text-white p-10">.col-12 .col-md-3</div>
	</div>
	<?php if ( function_exists( 'add_wistia_video' ) ): add_wistia_video(); ?>
		<script>
			is_logged_in = false;
		window._wq = window._wq || [];
		_wq.push({ id: "sajsbs1vl5", onReady: function(video) {
			var video = Wistia.api("sajsbs1vl5");
			video.bind("secondchange", function(s) {
				if (s >= 5 && !is_logged_in) {
					// If user is not logged in open popup
					video.pause();
					console.log("We just reached " + s + " seconds!");
					$("#loginModal").modal('show');
				}
			});
			video.bind('play', function() {
				console.log(video.time());
				if (video.time() >= 60 && !is_logged_in) {
					// If user is not logged in open popup
					video.pause();
					$("#loginModal").modal('show');
				}
			});
			video.play();
		}});
		</script>
	<div class="row mb-100">
		<div class="col-12">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#loginModal">
			    Open Modal
			</button>
			<div class="modal" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				    <div class="modal-content">
				        <div class="modal-header">
				            <h5 class="modal-title">Please login to continue watching</h5>
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                <span aria-hidden="true">&times;</span>
				            </button>
				        </div>
				        <div class="modal-body">
							<form id="login" action="login" method="post">
								<h1>Login</h1>
								<p class="status"></p>
								<label for="username">Username</label>
								<input id="username" type="text" name="username">
								<label for="password">Password</label>
								<input id="password" type="password" name="password">
								<input class="btn btn-primary" type="submit" value="Login" name="submit">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
							</form>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>

<?php
get_footer();
