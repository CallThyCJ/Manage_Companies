


document.addEventListener("DOMContentLoaded", function () {
    const employeeForm = document.getElementById("newEmployeeForm");
    const companyForm = document.getElementById("newCompanyForm");

    if (companyForm) {
        companyForm.addEventListener("submit", function (event) {
            validation(event, "company");
        });
    } else {
        console.warn("Form with ID 'newCompanyForm' not found.");
    }

    if (employeeForm) {
        employeeForm.addEventListener("submit", function (event) {
            validation(event, "employee");
        });
    } else {
        console.warn("Form with ID 'newEmployeeForm' not found.");
    }
});




function validation(event, formType) {
    const emailRegex = /^[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)$/

    if (formType === "company") {
        const nameInput = document.getElementById("companyName");
        const emailInput = document.getElementById("companyEmail");
        const companyWebsite = document.getElementById("companyWebsite");
        const companyLogo = document.getElementById("companyLogo");

//     clear any previous errors
        let errors = [];
        nameInput.classList.remove("error");
        emailInput.classList.remove("error");
        companyWebsite.classList.remove("error");

//     validate company name
        if (nameInput.value.trim() === "") {
            errors.push("Company Name is required");
            nameInput.classList.add("error");
        }

        // validate company email

        if (!emailRegex.test(emailInput.value)) {
            errors.push("please enter a valid email address");
            emailInput.classList.add("error");
        }

//    validate company website url
        const urlRegex = /^(https?:\/\/)?([\w\d\.-]+)\.([a-z\.]{2,6})(\/[\w\d\.-]*)*\/?$/;
        if (companyWebsite.value.trim() !== "" && !urlRegex.test(companyWebsite.value)) {
            errors.push("please enter a valid url");
            companyWebsite.classList.add("error");
        }

//     validate logo
        const allowedFileTypes = /(\.jpg|\.jpeg|\.png|\.gif|\.svg)$/i;
        if (companyLogo.files.length !== 0 && !allowedFileTypes.test(companyLogo.files[0].name)) {
            errors.push("Please upload a valid image (jpeg, png, gif, svg).");
        }


//     stop form submission if there are any errors
        if (errors.length > 0) {
            event.preventDefault();
            console.log("please correct errors");
        }

    } else if (formType === "employee") {
        const firstNameInput = document.getElementById("employeeFirstName");
        const lastNameInput = document.getElementById("employeeLastName");
        const emailInput = document.getElementById("employeeEmail");
        const phoneNumberInput = document.getElementById("employeePhoneNumber");

        //     clear any previous errors
        let errors = [];
        firstNameInput.classList.remove("error");
        lastNameInput.classList.remove("error");
        emailInput.classList.remove("error");
        phoneNumberInput.classList.remove("error");

//     validate employee first name
        if (firstNameInput.value.trim() === "") {
            errors.push("Employee Name is required");
            firstNameInput.classList.add("error");
        }

        // validate employee last name
        if (lastNameInput.value.trim() === "") {
            errors.push("Employee Name is required");
            lastNameInput.classList.add("error");
        }

        // validate company email
        if (!emailRegex.test(emailInput.value)) {
            errors.push("please enter a valid email address");
            emailInput.classList.add("error");
        }

//    validate employee phone number
        const phoneRegex = /^(\+?\d{1,3}[-.\s]?)?(\(?\d{1,4}\)?[-.\s]?)?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/;
        if (phoneNumberInput.value.trim() !== "" && !phoneRegex.test(phoneNumberInput.value)) {
            errors.push("please enter a valid url");
            phoneNumberInput.classList.add("error");
        }



//     stop form submission if there are any errors
        if (errors.length > 0) {
            event.preventDefault();
            console.log("please correct errors");
        }
    }
}
