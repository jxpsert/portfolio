const toggleDescription = (id) => {
    const descriptions = document.querySelectorAll(".description");
    descriptions.forEach((description) => {
        if (description.id !== id) {
            description.classList.remove("expanded");
        }
    });

    const description = document.getElementById(id);
    description.classList.toggle("expanded");
};

window.toggleDescription = toggleDescription;
