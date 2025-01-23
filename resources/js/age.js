const age = document.getElementById("age");
if (age) {
    const birthdate = new Date(2005, 3, 18); // April 18, 2005 (month is 3 because months are 0-indexed)
    const now = new Date();

    let ageValue = now.getFullYear() - birthdate.getFullYear();
    const monthDiff = now.getMonth() - birthdate.getMonth();
    const dayDiff = now.getDate() - birthdate.getDate();

    if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
        ageValue--;
    }

    age.innerHTML = ageValue;
}
