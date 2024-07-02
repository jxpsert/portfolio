document.addEventListener("DOMContentLoaded", function () {
    document
        .querySelectorAll("input[required], textarea[required]")
        .forEach((input) => {
            const label = document.querySelector(`label[for="${input.id}"]`);
            if (label) {
                label.classList.add("required");
            }
        });
});
