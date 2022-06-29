<?php 
/*************************************************************************
 * Prints off unsupported browser modal
 ************************************************************************/
function unsupported_browser_modal(){
  echo '<div class="modal fade" id="unsupported-browser" tabindex="-1" role="dialog" aria-hidden="true">
  	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
  		<div class="modal-content">
  			<div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
  				<h2 class="mb-20">Unsupported Browser</h2>
  				<div class="out-of-date">
  					<p>Looks like your web browser is out of date. Update your browser for more security, speed, and the best experience on this site. </p>
  					<hr>
  					<p>To get the best experience possible, upgrade your browser to the latest version of <a href="https://www.microsoft.com/en-us/edge" target="_blank">Chrome</a>, <a href="https://www.mozilla.org/en-US/firefox/new/" target="_blank">Firefox</a>, <a href="https://www.apple.com/safari/" target="_blank">Safari</a> or <a href="https://www.microsoft.com/en-us/edge" target="_blank">Microsoft Edge</a>.</p>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>';
}








 ?>