<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">

<!-- moviegrid07:29-->
<head>
	<!-- Basic need -->
	@include('home.css')
	
</head>
<body>
<!--preloading-->
@include('home.preloader')
<!--end of preloading-->
<!--login form popup-->
<!--end of signup form popup-->

<!-- BEGIN | Header -->
<header class="ht-header">
	@include('home.header')
</header>
<!-- END | Header -->

<div class="hero common-hero">
	<div class="container">
		@include('home.slider')
	</div>
</div>
@include('home.content')
<!-- footer section-->

<!-- end of footer section-->

@include('home.footer')
<script>
	function updateSelectOptions() {
		const select = document.getElementById('perPageSelect');
		const selectedValue = select.value;
		const form = document.getElementById('perPageForm');

		// Clear existing options
		select.innerHTML = '';

		// Generate new options
		for (let i = 1; i <= selectedValue; i++) {
			const option = document.createElement('option');
			option.value = i;
			option.text = `${i} Movies`;
			if (i == selectedValue) {
				option.selected = true;
			}
			select.appendChild(option);
		}

		// Submit the form
		form.submit();
	}

	function goToCategory() {
		const select = document.getElementById('categorySelect');
		const selectedValue = select.value;
		if (selectedValue !== 'Select Option') {
			window.location.href = selectedValue;
		}
	}

	// On page load, adjust the select options based on the current selected value
	document.addEventListener('DOMContentLoaded', (event) => {
		updateSelectOptions();
	});
</script>
</body>

<!-- moviegrid07:38-->
</html>