import { Calendar } from "@fullcalendar/core"
import dayGridPlugin from "@fullcalendar/daygrid"
import listPlugin from "@fullcalendar/list"
import timeGridPlugin from "@fullcalendar/timegrid"

const element = document.getElementById("schedule-calendar")

if (element) {
    const calendar = new Calendar(element, {
        plugins: [dayGridPlugin, listPlugin, timeGridPlugin],
        initialView: "dayGridMonth",
        height: "auto",
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,listMonth",
        },
        events: {
            url: element.dataset.eventsUrl,
            extraParams: () => ({ view: document.querySelector("[data-calendar-filter].active")?.dataset.calendarFilter || "my" }),
        },
        eventClick: (info) => {
            if (info.event.url) {
                info.jsEvent.preventDefault()
                window.location.href = info.event.url
            }
        },
    })
    calendar.render()

    document.querySelectorAll("[data-calendar-filter]").forEach((button) => {
        button.addEventListener("click", () => {
            document.querySelectorAll("[data-calendar-filter]").forEach((item) => item.classList.remove("active", "bg-primary", "text-white"))
            button.classList.add("active", "bg-primary", "text-white")
            calendar.refetchEvents()
        })
    })
}
