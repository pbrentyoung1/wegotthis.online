import { Calendar } from "@fullcalendar/core"
import dayGridPlugin from "@fullcalendar/daygrid"
import listPlugin from "@fullcalendar/list"
import timeGridPlugin from "@fullcalendar/timegrid"

const element = document.getElementById("schedule-calendar")

if (element) {
    const mobile = window.matchMedia("(max-width: 767px)").matches
    const filters = document.querySelectorAll("[data-calendar-filter]")
    const calendar = new Calendar(element, {
        plugins: [dayGridPlugin, listPlugin, timeGridPlugin],
        initialView: mobile ? "listMonth" : "dayGridMonth",
        height: "auto",
        headerToolbar: {
            left: mobile ? "prev,next" : "prev,next today",
            center: "title",
            right: mobile ? "today" : "dayGridMonth,timeGridWeek,listMonth",
        },
        events: {
            url: element.dataset.eventsUrl,
            extraParams: () => {
                const activeFilter = document.querySelector("[data-calendar-filter].active")

                return activeFilter ? { view: activeFilter.dataset.calendarFilter } : {}
            },
        },
        eventClick: (info) => {
            if (info.event.url) {
                info.jsEvent.preventDefault()
                window.location.href = info.event.url
            }
        },
    })
    calendar.render()

    filters.forEach((button) => {
        button.addEventListener("click", () => {
            filters.forEach((item) => item.classList.remove("active", "bg-primary", "text-white"))
            button.classList.add("active", "bg-primary", "text-white")
            calendar.refetchEvents()
        })
    })
}
