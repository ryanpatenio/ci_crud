$(document).ready(function () {
	const addModal = $("#productModal");

	$("#addForm").submit(function (e) {
		e.preventDefault();

		let formData = $(this).serialize(); //Serialize array

		//ajax
		$.ajax({
			url: "add-product",
			method: "post",
			data: formData,
			dataType: "json",

			success: function (resp) {
				console.log(resp);
				formModalClose(addModal, $("#addForm"));
				if (resp.message == "success") {
					//swal found path assets/swal
					//function for message path assets/js/msg.js
					message("New Product Created Successfully!", "success");
				}
			},
			error: function (xhr, status, error) {
				console.log(xhr.responseText);
				if (xhr.responseJSON.message == "validation_false") {
					msg("Oops! Unexpected Error! Validation Error", "error");
				}
			},
		});
	});

	//edit Modal
	$(document).on("click", "#edit-btn", function (e) {
		e.preventDefault();

		//get the ID of Product using attributes in btn data-id
		let id = $(this).attr("data-id");

		$.ajax({
			url: "edit-product",
			method: "get",
			data: { id: id }, //first param the variable will you catch in the controller 2nd param the let id variable
			dataType: "json",

			success: function (data) {
				//expects json data to return
				console.log(data);
			},

			error: function (xhr, status, error) {
				console.log(xhr.responseText);
			},
		});
	});
});
