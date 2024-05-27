$(document).ready(function () {
	const addModal = $("#productModal");
	const editModal = $("#editModal");

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

		//reset form first
		resetForm($("#updateForm"));

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
				editModal.modal("show");
				$("#product-id").val(data.product_id);
				$("#product-name").val(data.product_name);
				$("#current-category").val(data.category_id);
				$("#current-category").text(data.category_name);
			},

			error: function (xhr, status, error) {
				console.log(xhr.responseText);
			},
		});
	});

	//submit update Form
	$("#updateForm").submit(function (e) {
		e.preventDefault();

		let formData = $(this).serialize();

		$.ajax({
			url: "update-product",
			method: "post",
			data: formData,
			dataType: "json",

			success: function (resp) {
				console.log(resp);
				formModalClose(editModal, $("#updateForm"));
				if (resp.message == "success") {
					message("Product Updated Successfully!", "success");
				}
			},

			error: function (xhr, status, error) {
				res(xhr.responseText);
				if (xhr.responseJSON.message == "id_null") {
					msg("Oops! ID null", "error");
				}
				if (xhr.status == 500) {
					msg("Oops! unexpected Error!", "error");
				}
			},
		});
	});
});
