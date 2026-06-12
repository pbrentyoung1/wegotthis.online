const schedule = document.querySelector("[data-project-schedule]")

if (schedule) {
    let dragging = null

    schedule.querySelectorAll("[draggable=true]").forEach((item) => {
        item.addEventListener("dragstart", (event) => {
            event.stopPropagation()
            dragging = item
            item.classList.add("opacity-50")
        })
        item.addEventListener("dragend", (event) => {
            event.stopPropagation()
            item.classList.remove("opacity-50")
            dragging = null
        })
    })

    schedule.querySelectorAll("[data-sort-list]").forEach((list) => {
        list.addEventListener("dragover", (event) => {
            event.preventDefault()
            if (!dragging || dragging.dataset.sortType !== list.dataset.sortList) return
            if (dragging.dataset.sortType === "task" && dragging.dataset.deliverableId !== list.dataset.deliverableId) return

            const next = [...list.querySelectorAll(":scope > [draggable=true]:not(.opacity-50)")].find((item) => {
                const box = item.getBoundingClientRect()
                return event.clientY < box.top + box.height / 2
            })
            list.insertBefore(dragging, next || null)
        })
    })

    document.querySelector("[data-save-schedule]")?.addEventListener("click", async (event) => {
        const button = event.currentTarget
        button.disabled = true
        const taskOrders = {}
        schedule.querySelectorAll("[data-sort-list=task]").forEach((list) => {
            taskOrders[list.dataset.deliverableId] = [...list.querySelectorAll(":scope > [data-task-id]")].map((item) => Number(item.dataset.taskId))
        })
        const response = await fetch(schedule.dataset.reorderUrl, {
            method: "PATCH",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify({
                deliverable_ids: [...schedule.querySelectorAll("[data-sort-type=deliverable]")].map((item) => Number(item.dataset.deliverableId)),
                task_orders: taskOrders,
            }),
        })
        button.disabled = false
        button.textContent = response.ok ? "Order saved" : "Could not save"
        setTimeout(() => (button.textContent = "Save order"), 1800)
    })
}
