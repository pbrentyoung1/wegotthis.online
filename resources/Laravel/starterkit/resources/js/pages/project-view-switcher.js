const switcher = document.querySelector("[data-project-view-switcher]")

if (switcher) {
    const links = [...switcher.querySelectorAll("[data-project-view-link]")]
    const reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches

    links.forEach((link) => {
        link.addEventListener("click", (event) => {
            if (
                reducedMotion ||
                link.getAttribute("aria-current") === "page" ||
                event.metaKey ||
                event.ctrlKey ||
                event.shiftKey ||
                event.altKey
            ) {
                return
            }

            event.preventDefault()
            switcher.style.setProperty("--project-view-index", link.dataset.projectViewIndex)

            links.forEach((item) => {
                item.classList.remove("text-primary")
                item.classList.add("text-default-500")
            })
            link.classList.remove("text-default-500")
            link.classList.add("text-primary")

            window.setTimeout(() => {
                window.location.href = link.href
            }, 180)
        })
    })
}
