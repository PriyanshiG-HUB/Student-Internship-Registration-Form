document.querySelector("form").addEventListener("submit", function(e) {

    let message = document.getElementById("message");

    message.innerHTML = "";
    message.style.color = "red";

    let fname = document.getElementById("First_Name").value.trim();
    let lname = document.getElementById("Last_Name").value.trim();
    let dob = document.getElementById("date").value;
    let mobile = document.getElementById("phno").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("paswd").value.trim();

    let gender = document.querySelector('input[name="gender"]:checked');

    let dept = document.querySelectorAll('input[name="Dept[]"]:checked');

    let resume = document.getElementById("resume").files.length;

    if (fname === "") {
        message.innerHTML = "First Name is required";
        e.preventDefault();
        return;
    }

    if (lname === "") {
        message.innerHTML = "Last Name is required";
        e.preventDefault();
        return;
    }

    if (dob === "") {
        message.innerHTML = "Please select Date of Birth";
        e.preventDefault();
        return;
    }

    let mobilePattern = /^[0-9]{10}$/;

    if (!mobilePattern.test(mobile)) {
        message.innerHTML = "Enter valid 10-digit mobile number";
        e.preventDefault();
        return;
    }

    if (email === "") {
        message.innerHTML = "Email is required";
        e.preventDefault();
        return;
    }

    if (password.length < 6) {
        message.innerHTML = "Password must be at least 6 characters";
        e.preventDefault();
        return;
    }

    if (!gender) {
        message.innerHTML = "Please select gender";
        e.preventDefault();
        return;
    }

    if (dept.length === 0) {
        message.innerHTML = "Please select at least one department";
        e.preventDefault();
        return;
    }

    if (resume === 0) {
        message.innerHTML = "Please upload your resume";
        e.preventDefault();
        return;
    }

    message.style.color = "green";
    message.innerHTML = "Form Submitted Successfully";

});