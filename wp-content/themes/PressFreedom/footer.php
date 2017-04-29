			</div>
			<footer>
				<div class="copyright">&copy; Philip Merrill College of Journalism</div>
				<a href="http://merrill.umd.edu/" target="_blank"> 
					<img id="footerMerrill" class="merrill-logo" src="http://pressuncuffed.org/wp-content/uploads/2017/03/merrill-logo.png" alt="Philip Merrill logo" />
				</a>
				<?php wp_footer(); ?>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
				<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/script.js" type="text/javascript"></script>
				<!--===== FACEBOOK CODE =====-->
				<!-- Load Facebook SDK for JavaScript -->
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<!--===== TWITTER CODE =====-->
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			</footer>
		</div>
	</body>
</html>