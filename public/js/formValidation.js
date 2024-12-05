


document.addEventListener("DOMContentLoaded", function () {
    const employeeForm = document.getElementById("newEmployeeForm");
    const companyForm = document.getElementById("newCompanyForm");
    const loginForm = document.getElementById("loginForm");
    const registerForm = document.getElementById("newUserForm");

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

    if (registerForm) {
        registerForm.addEventListener("submit", function (event) {
            validation(event, "register");
        });
    } else {
        console.warn("Form with ID 'newUserForm' not found.");
    }

    if (loginForm) {
        loginForm.addEventListener("submit", function (event) {
            validation(event, "login");
        });
    } else {
        console.warn("Form with ID 'loginForm' not found.");
    }
});




function validation(event, formType) {
    const emailRegex = /^[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)$/;
    const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

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
        if (companyWebsite.value.trim() === "" && !urlRegex.test(companyWebsite.value)) {
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

        // validate employee email
        if (!emailRegex.test(emailInput.value)) {
            errors.push("please enter a valid email address");
            emailInput.classList.add("error");
        }

//    validate employee phone number
        const phoneRegex = /^(\+?\d{1,3}[-.\s]?)?(\(?\d{1,4}\)?[-.\s]?)?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/;
        if (phoneNumberInput.value.trim() === "" && !phoneRegex.test(phoneNumberInput.value)) {
            errors.push("please enter a valid url");
            phoneNumberInput.classList.add("error");
        }



//     stop form submission if there are any errors
        if (errors.length > 0) {
            event.preventDefault();
            console.log("please correct errors");
        }

    } else if (formType === "register") {
        const firstNameInput = document.getElementById("userFirstName");
        const lastNameInput = document.getElementById("userLastName");
        const usernameInput = document.getElementById("username");
        const emailInput = document.getElementById("userEmail");
        const passwordInput = document.getElementById("userPassword");

    //     clear any previous errors
        let errors = [];
        firstNameInput.classList.remove("error");
        lastNameInput.classList.remove("error");
        usernameInput.classList.remove("error");
        emailInput.classList.remove("error");
        passwordInput.classList.remove("error");

    //     validate use first name
        if (firstNameInput.value.trim() === "") {
            errors.push("User first name is required");
            firstNameInput.classList.add("error");
        }

        // validate user last name
        if (lastNameInput.value.trim() === "") {
            errors.push("User last name is required");
            lastNameInput.classList.add("error");
        }

        // validate username
        if (usernameInput.value.trim() === "") {
            errors.push("username is required");
            usernameInput.classList.add("error");
        }

    //   validate user email
        if (!emailRegex.test(emailInput.value)) {
            errors.push("please enter a valid email address");
            emailInput.classList.add("error");
        }

    //  validate user password
        if (!passwordInput.value.trim()) {
            errors.push("Password cannot be blank.");
            passwordInput.classList.add("error");
        } else if (!passwordRegex.test(passwordInput.value)) {
            errors.push("password must have one letter, one digit, one special character and at least 8 characters long");
            passwordInput.classList.add("error");
        }

        if (errors.length > 0) {
            event.preventDefault();
            console.log("please correct errors");
        }

    } else if (formType === "login") {
        const emailInput = document.getElementById("loginUserEmail");
        const passwordInput = document.getElementById("loginUserPassword");

        //  clear any previous errors
        let errors = [];
        emailInput.classList.remove("error");
        passwordInput.classList.remove("error");

    //     validate email
        if (!emailRegex.test(emailInput.value)) {
            errors.push("please enter a valid email address");
            emailInput.classList.add("error");
        }

    //     validate password
        if (!passwordInput.value.trim()) {
            errors.push("Password cannot be blank.");
            passwordInput.classList.add("error");
        }

        if (errors.length > 0) {
            event.preventDefault();
            console.log("please correct errors");
        }
    }
}
