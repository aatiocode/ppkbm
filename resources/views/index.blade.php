<!doctype html>
<html lang="en">
  <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=0, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
		<!-- Favicons -->
		<link rel="icon" href="{{ URL::asset('/uploads/favicon-new.ico') }}" type="image/x-icon"/>
    {{-- End Favicons --}}
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/app.css')  }}">
		<script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
		<title>PKBMN</title>
		@yield('js')
  </head>
  <body>
		<div id="app"></div>
		@if(Session::has('message'))
			{!! Session::get('message') !!}
		@endif
		@yield('contents')
		<script>
			$(document).ready(function(){
        CKEDITOR.replaceAll('my-editor');
				setTimeout(function(){ $(".alert").slideUp('slow') }, 2000)
				$('#inputGroupFile01').on('change',function(){
					var fileName = $(this).val();
					$(this).prev('.custom-file-label').html(fileName);
				})
        $('.menu-parent, .menu-parent-child').on('click', function(e){
          e.stopImmediatePropagation();
          e.preventDefault();
          const menuId = $(this).attr('data-id')
          const menuOpen = $(this).attr('data-menu')
          $(this).find('.caret-icon').toggleClass('fa-caret-down fa-caret-up');
          if (menuOpen === 'true') {
            $(this).attr('data-menu', false)
            $(`.menu-child-${menuId}`).removeClass('d-block').addClass('d-none')
            return
          }
          $(this).attr('data-menu', true)
          $(`.menu-child-${menuId}`).removeClass('d-none').addClass('d-block')
          return
        })
        $('.show-hide-password').on('click', function() {
          $(this).parents().find('i').toggleClass("fa-eye fa-eye-slash");
          var input = $('.input-password');
          if (input.prop('type') === 'password') {
            input.prop('type', 'text');
          } else {
            input.prop('type', 'password');
          }
        });
        selectAll = function () {
          const checkboxChild = "input.checkbox-child:checkbox"
          if ($('input.checkbox-select-all:checkbox').is(':checked')) {
            return $(checkboxChild).prop('checked', true);
          }
          return $(checkboxChild).prop('checked', false);
        }
        selectAllAccessGroup = function () {
          const checkboxChild = "input.checkbox-child-access-group:checkbox"
          if ($('input.checkbox-select-all-access-group:checkbox').is(':checked')) {
            return $(checkboxChild).prop('checked', true);
          }
          return $(checkboxChild).prop('checked', false);
        }
			})
		</script>
  </body>
</html>