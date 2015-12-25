		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script type="text/javascript">
		$("a.post-content").each(function() {
			var maxwidth = 100;
			if ($(this).text().length > maxwidth) {
				$(this).text($(this).text().substring(0, maxwidth));
				$(this).html($(this).html() + '...');
			};
		});
		$("a.cheap-title").each(function() {
			if ($(this).text().length > 8) {
				$(this).text($(this).text().substring(0, 8));
				$(this).html($(this).html() + '...');
			}
		});
		</script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jQuery.paginate.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>