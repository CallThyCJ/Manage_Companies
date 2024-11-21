const addcompanyForm = document.getElementById("newCompanyForm");


addcompanyForm.addEventListener("submit", function (event){
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
    const emailRegex = /^[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)$/
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
    if (companyLogo.files.length !== 0 && !allowedFileTypes.test(companyLogo.value)) {
        errors.push("Please upload a valid image (jpeg, png, gif, svg).");
    }

//     stop form submission if there are any errors
    if (errors.length > 0) {
        event.preventDefault();
        console.log("please correct errors");
    }
});
