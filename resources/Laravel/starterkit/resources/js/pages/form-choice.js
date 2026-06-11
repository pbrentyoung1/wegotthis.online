import Choices from "choices.js"

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("[data-choices]").forEach((element) => {
        new Choices(element, {
            placeholder: true,
            placeholderValue: element.dataset.placeholder,
            removeItemButton: element.hasAttribute("data-choices-removeitem"),
            searchEnabled: true,
            shouldSort: false,
        })
    })
})
