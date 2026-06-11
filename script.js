document
.querySelector("form")
.addEventListener(
"submit",
function(e){

let message=
document.getElementById(
"message"
);

message.innerHTML="";
message.style.color="red";

let fname=
document
.getElementById(
"First_Name"
)
.value.trim();

let lname=
document
.getElementById(
"Last_Name"
)
.value.trim();

let sid=
document
.getElementById(
"s_id"
)
.value.trim();

let cgpa=
document
.getElementById(
"cgpa"
)
.value.trim();

let dob=
document
.getElementById(
"date"
)
.value;

let mobile=
document
.getElementById(
"phno"
)
.value.trim();

let email=
document
.getElementById(
"email"
)
.value.trim();

let password=
document
.getElementById(
"paswd"
)
.value.trim();

let gender=
document.querySelector(
'input[name="gender"]:checked'
);

let dept=
document.querySelectorAll(
'input[name="Dept[]"]:checked'
);

let resume=
document.getElementById(
"resume"
).files.length;

if(fname===""){
message.innerHTML=
"Enter First Name";
e.preventDefault();
return;
}

if(lname===""){
message.innerHTML=
"Enter Last Name";
e.preventDefault();
return;
}

if(sid===""){
message.innerHTML=
"Enter Student ID";
e.preventDefault();
return;
}

let cgpaValue=
parseFloat(cgpa);

if(
isNaN(cgpaValue)
||
cgpaValue<0
||
cgpaValue>10
){
message.innerHTML=
"CGPA must be between 0 and 10";
e.preventDefault();
return;
}

if(dob===""){
message.innerHTML=
"Select DOB";
e.preventDefault();
return;
}

let mobilePattern=
/^[0-9]{10}$/;

if(
!mobilePattern.test(
mobile
)
){
message.innerHTML=
"Enter valid mobile";
e.preventDefault();
return;
}

let emailPattern=
/^[^\s@]+@[^\s@]+\.[^\s@]+$/;

if(
!emailPattern.test(
email
)
){
message.innerHTML=
"Invalid Email";
e.preventDefault();
return;
}

let passPattern=
/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

if(
!passPattern.test(
password
)
){
message.innerHTML=
"Password must contain uppercase lowercase and number";
e.preventDefault();
return;
}

if(!gender){
message.innerHTML=
"Select Gender";
e.preventDefault();
return;
}

if(dept.length===0){
message.innerHTML=
"Select Department";
e.preventDefault();
return;
}

if(resume===0){
message.innerHTML=
"Upload Resume";
e.preventDefault();
return;
}

message.style.color=
"green";

message.innerHTML=
"Validation Successful";

});