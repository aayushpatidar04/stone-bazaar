  'use strict';
$(document).ready(function () {
//Basic alert
	const sweet1 = document.querySelector('.sweet-1');
	if(sweet1){
		sweet1.onclick = function(){
			swal("Here's a message!", "It's pretty, isn't it?")
		};
	}
	//success message
	const sweet2 = document.querySelector('.alert-success-msg');
	if(sweet2){
		sweet2.onclick = function(){
			swal("Good job!", "You clicked the button!", "success");
		};
	}

	//Alert confirm
	const sweet3 = document.querySelector('.alert-confirm');
	if(sweet3){
		sweet3.onclick = function(){
			swal({
						title: "Are you sure?",
						text: "Your will not be able to recover this imaginary file!",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: false
					},
					function(){
						swal("Deleted!", "Your imaginary file has been deleted.", "success");
					});
		};
	}

	//Success or cancel alert
	const sweet4 = document.querySelector('.alert-success-cancel');
	if(sweet4){
		sweet4.onclick = function(){
			swal({
						title: "Are you sure?",
						text: "You will not be able to recover this imaginary file!",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						confirmButtonText: "Yes, delete it!",
						cancelButtonText: "No, cancel plx!",
						closeOnConfirm: false,
						closeOnCancel: false
					},
					function(isConfirm) {
						if (isConfirm) {
							swal("Deleted!", "Your imaginary file has been deleted.", "success");
						} else {
							swal("Cancelled", "Your imaginary file is safe :)", "error");
						}
					});
		};
	}


	//prompt alert
	const sweet5 = document.querySelector('.alert-prompt');
	if(sweet5){
		sweet5.onclick = function(){
			swal({
				title: "An input!",
				text: "Write something interesting:",
				type: "input",
				showCancelButton: true,
				closeOnConfirm: false,
				inputPlaceholder: "Write something"
			}, function (inputValue) {
				if (inputValue === false) return false;
				if (inputValue === "") {
					swal.showInputError("You need to write something!");
					return false
				}
				swal("Nice!", "You wrote: " + inputValue, "success");
			});
		};
	}

	//Ajax alert
	const sweet6 = document.querySelector('.alert-ajax');
	if(sweet6){
		sweet6.onclick = function(){
			swal({
				title: "Ajax request example",
				text: "Submit to run ajax request",
				type: "info",
				showCancelButton: true,
				closeOnConfirm: false,
				showLoaderOnConfirm: true
			}, function () {
				setTimeout(function () {
					swal("Ajax request finished!");
				}, 2000);
			});
		};
	}


		$('#openBtn').on('click',function () {
			$('#myModal').modal({
				show: true
			})
		});

		$(document).on('show.bs.modal', '.modal', function (event) {
			var zIndex = 1040 + (10 * $('.modal:visible').length);
			$(this).css('z-index', zIndex);
			setTimeout(function() {
				$('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
			}, 0);
		});
	});
  