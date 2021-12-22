const form = document.getElementById("form");
const order = document.getElementById("order");
const details = document.getElementById("details");

form.addEventListener("submit", (e) => {
	e.preventDefault();

	checkInputs();
});

function checkInputs() {
	const orderValue = order.value.trim();
	const detailsValue = details.value.trim();

	if (orderValue === "") {
		setErrorFor(order, "order no cannot be blank");
	} else {
		setSuccessFor(order);
	}

	if (detailsValue === "") {
		setErrorFor(details, "details cannot be blank");
	} else if (!isDetails(detailsValue)) {
		setErrorFor(details, "Not a valid details");
	} else {
		setSuccessFor(details);
	}
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector("small");
	formControl.className = "form-control error";
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = "form-control success";
}

