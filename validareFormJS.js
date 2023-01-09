const password = document.getElementById('password')
const passwordCheck = document.getElementById('passwordCheck')
const eroare = document.getElementById('eroare')

if(password !== passwordCheck) {
    eroare = "Parola nu se potriveste";
}