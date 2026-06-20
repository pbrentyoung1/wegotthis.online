import Sortable from "sortablejs"
import Swal from "sweetalert2"

/**
 * Project board drag-and-drop.
 *
 * Each column's card list is a Sortable instance sharing one group, so cards
 * can be reordered within a column or dragged across columns. On drop we PATCH
 * the moved deliverable's new status (read from the destination column) plus the
 * destination column's new card order, then refresh the column count badges.
 */
function initBoard() {
    const board = document.querySelector("[data-board]")
    const supportsDrag = window.matchMedia("(min-width: 768px) and (pointer: fine)").matches
    if (!board || !supportsDrag) {
        return
    }

    const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute("content")
    const lists = board.querySelectorAll("[data-board-list]")

    lists.forEach((list) => {
        // eslint-disable-next-line no-new
        new Sortable(list, {
            group: "board-deliverables",
            animation: 150,
            draggable: "[data-card]",
            ghostClass: "board-card-ghost",
            chosenClass: "board-card-chosen",
            dragClass: "board-card-drag",
            forceFallback: true,
            fallbackOnBody: true,
            onMove: (evt) => {
                const card = evt.dragged
                const targetStatus = evt.to.getAttribute("data-status")
                const currentStatus = card.getAttribute("data-current-status")
                const allowedTargets = (card.getAttribute("data-allowed-targets") || "").split("|").filter(Boolean)

                return targetStatus === currentStatus || allowedTargets.includes(targetStatus)
            },
            onStart: () => board.classList.add("is-dragging"),
            onEnd: (evt) => {
                board.classList.remove("is-dragging")
                if (shouldBlockProductionMove(evt)) {
                    revertMove(evt)
                    syncEmptyStates(board)
                    updateCounts(board)
                    window.setTimeout(() => {
                        dispatchProductionReadiness(evt.item)
                    }, 0)
                    return
                }
                handleDrop(board, evt, token)
            },
        })
    })

    syncEmptyStates(board)
}

function showBoardAlert(board, message) {
    const alert = board.closest(".card")?.querySelector("[data-board-alert]")
    if (!alert) {
        return
    }

    alert.textContent = message
    alert.classList.remove("hidden")
}

function hideBoardAlert(board) {
    const alert = board.closest(".card")?.querySelector("[data-board-alert]")
    if (!alert) {
        return
    }

    alert.textContent = ""
    alert.classList.add("hidden")
}

function isCardReadyForProduction(card) {
    return card.getAttribute("data-owner-ready") === "true" && card.getAttribute("data-due-ready") === "true"
}

function productionReadinessMessage(card) {
    const hasOwner = card.getAttribute("data-owner-ready") === "true"
    const hasDueDate = card.getAttribute("data-due-ready") === "true"

    if (!hasOwner && !hasDueDate) {
        return "Set an owner and due date before moving this deliverable to In Production."
    }

    if (!hasOwner) {
        return "Set an owner before moving this deliverable to In Production."
    }

    return "Set a due date before moving this deliverable to In Production."
}

function shouldBlockProductionMove(evt) {
    const card = evt.item
    const currentStatus = card.getAttribute("data-current-status")
    const targetStatus = evt.to.getAttribute("data-status")

    if (evt.to === evt.from || currentStatus !== "Planning" || targetStatus !== "In Production") {
        return false
    }

    return !isCardReadyForProduction(card)
}

function dispatchProductionReadiness(card) {
    const editUrl = card.getAttribute("data-edit-url")
    const title = "More information needed"
    const text = "Deliverables need an owner and due date to be considered In Production."

    Swal.fire({
        title,
        text,
        icon: "info",
        showCancelButton: true,
        confirmButtonText: "Add information",
        cancelButtonText: "Cancel",
        buttonsStyling: false,
        customClass: {
            popup: "rounded-3xl",
            confirmButton: "btn bg-primary text-white hover:bg-primary-hover me-2",
            cancelButton: "btn bg-light text-default-700",
        },
    }).then((result) => {
        if (result.isConfirmed && editUrl) {
            window.location.href = editUrl
        }
    })
}

function initDeliverableDetails() {
    const dialog = document.getElementById("board-deliverable-dialog")
    const content = dialog?.querySelector("[data-dialog-content]")
    if (!dialog || !content) {
        return
    }

    let returnFocus = null
    let currentDeliverableId = null

    const renderDeliverable = (id) => {
        const template = document.getElementById(`board-deliverable-detail-${id}`)
        if (!template) {
            return
        }

        currentDeliverableId = id
        content.replaceChildren(template.content.cloneNode(true))
    }

    const openDetails = (trigger, options = {}) => {
        returnFocus = trigger
        renderDeliverable(options.deliverableId || trigger.dataset.detailTrigger)
        const workspace = content.querySelector("[data-deliverable-workspace]")
        if (workspace && options.panel) {
            switchPanel(workspace, options.panel)
        }
        dialog.showModal()
    }

    const switchPanel = (workspace, panelName) => {
        workspace.querySelectorAll("[data-workspace-panel]").forEach((panel) => {
            panel.classList.toggle("hidden", panel.dataset.workspacePanel !== panelName)
        })
        workspace.querySelectorAll("[data-workspace-panel-button]").forEach((button) => {
            const active = button.dataset.workspacePanelButton === panelName
            button.classList.toggle("bg-white", active)
            button.classList.toggle("text-primary", active)
            button.classList.toggle("shadow-sm", active)
            button.classList.toggle("text-default-500", !active)
        })
    }

    const showErrors = (form, errors) => {
        const container = form.querySelector("[data-form-errors]")
        if (!container) {
            return
        }

        const messages = Object.values(errors || {}).flat()
        container.innerHTML = messages.length
            ? `<div class="rounded-xl bg-danger/10 p-4 text-sm text-danger">${messages.map((message) => `<p>${escapeHtml(message)}</p>`).join("")}</div>`
            : ""
    }

    const showTaskErrors = (form, errors) => {
        if (!form) {
            return
        }

        const container = form.querySelector("[data-task-form-errors]")
        if (!container) {
            return
        }

        const messages = Object.values(errors || {}).flat()
        container.innerHTML = messages.length
            ? `<div class="rounded-xl bg-danger/10 p-4 text-sm text-danger">${messages.map((message) => `<p>${escapeHtml(message)}</p>`).join("")}</div>`
            : ""
    }

    const toggleTaskForm = (container, expanded) => {
        const panel = container?.querySelector("[data-task-form-panel]")
        if (!panel) {
            return
        }

        panel.classList.toggle("hidden", !expanded)
    }

    const updateDeliverableUi = (deliverable) => {
        const card = document.querySelector(`[data-card][data-deliverable-id="${deliverable.id}"]`)
        card?.querySelector("[data-card-title]")?.replaceChildren(deliverable.title)
        card?.querySelector("[data-card-type]")?.replaceChildren(deliverable.type)
        card?.querySelector("[data-card-due]")?.replaceChildren(deliverable.due_date_short || "")
        if (card) {
            card.setAttribute("data-owner-ready", deliverable.owner_profile_id ? "true" : "false")
            card.setAttribute("data-due-ready", deliverable.due_date_value ? "true" : "false")
        }

        const updateWorkspace = (workspace) => {
            if (!workspace) {
                return
            }
            workspace.querySelector("[data-detail-title]")?.replaceChildren(deliverable.title)
            workspace.querySelector("[data-detail-type]")?.replaceChildren(deliverable.type)
            workspace.querySelector("[data-detail-owner]")?.replaceChildren(deliverable.owner)
            workspace.querySelector("[data-detail-due]")?.replaceChildren(deliverable.due_date)
            workspace.querySelector("[data-detail-publish]")?.replaceChildren(deliverable.publish_date)
            workspace.querySelector("[data-detail-audience]")?.replaceChildren(deliverable.audience || "Not provided")
            workspace.querySelector("[data-detail-action]")?.replaceChildren(deliverable.desired_action || "Not provided")

            const attention = workspace.querySelector("[data-detail-attention]")
            if (attention) {
                attention.replaceChildren(deliverable.attention_state)
                attention.classList.toggle("hidden", deliverable.attention_state === "On Track")
            }

            workspace.querySelectorAll("[data-deliverable-edit-form]").forEach((form) => {
                form.elements.title.value = deliverable.title
                form.elements.deliverable_type_id.value = deliverable.deliverable_type_id || ""
                form.elements.owner_profile_id.value = deliverable.owner_profile_id || ""
                if (form.elements.internal_reviewer_profile_id) {
                    form.elements.internal_reviewer_profile_id.value = deliverable.internal_reviewer_profile_id || ""
                }
                if (form.elements.stakeholder_reviewer_profile_id) {
                    form.elements.stakeholder_reviewer_profile_id.value = deliverable.stakeholder_reviewer_profile_id || ""
                }
                form.elements.due_date.value = deliverable.due_date_value || ""
                form.elements.publish_date.value = deliverable.publish_date_value || ""
                form.elements.audience.value = deliverable.audience || ""
                form.elements.desired_action.value = deliverable.desired_action || ""
                if (form.elements.description) {
                    form.elements.description.value = deliverable.description_value || ""
                }
                if (form.elements.purpose) {
                    form.elements.purpose.value = deliverable.purpose_value || ""
                }
                form.elements.attention_state.value = deliverable.attention_state
            })

        }

        updateWorkspace(content.querySelector("[data-deliverable-workspace]"))
        updateWorkspace(document.getElementById(`board-deliverable-detail-${deliverable.id}`)?.content)
    }

    const escapeHtml = (value) => {
        const element = document.createElement("div")
        element.textContent = String(value)
        return element.innerHTML
    }

    document.addEventListener("click", (event) => {
        const trigger = event.target.closest("[data-detail-trigger]")
        if (!trigger || dialog.open || document.querySelector("[data-board].is-dragging")) {
            return
        }

        const interactive = event.target.closest("a, button, input, select, textarea, form, [role=menu]")
        if (interactive && interactive !== trigger) {
            return
        }

        event.preventDefault()
        openDetails(trigger)
    })

    dialog.addEventListener("click", (event) => {
        const panelButton = event.target.closest("[data-workspace-panel-button]")
        if (panelButton) {
            const workspace = panelButton.closest("[data-deliverable-workspace]")
            switchPanel(workspace, panelButton.dataset.workspacePanelButton)
            return
        }

        const taskFormToggle = event.target.closest("[data-task-form-toggle]")
        if (taskFormToggle) {
            const section = taskFormToggle.closest("[data-task-form-container]")
            toggleTaskForm(section, true)
            section?.querySelector("[data-task-create-form] input[name='title']")?.focus()
            return
        }

        const taskFormCancel = event.target.closest("[data-task-form-cancel]")
        if (taskFormCancel) {
            const section = taskFormCancel.closest("[data-task-form-container]")
            section?.querySelector("[data-task-create-form]")?.reset()
            showTaskErrors(section?.querySelector("[data-task-create-form]"), {})
            toggleTaskForm(section, false)
            return
        }

        const taskTrigger = event.target.closest("[data-task-trigger]")
        if (taskTrigger) {
            const template = document.getElementById(`board-task-detail-${taskTrigger.dataset.taskTrigger}`)
            if (template) {
                content.replaceChildren(template.content.cloneNode(true))
            }
            return
        }

        if (event.target.closest("[data-task-back]") && currentDeliverableId) {
            renderDeliverable(currentDeliverableId)
        }
    })

    dialog.addEventListener("submit", async (event) => {
        const form = event.target.closest("[data-deliverable-edit-form]")
        if (!form) {
            return
        }

        event.preventDefault()
        const button = form.querySelector("[data-save-deliverable]")
        button.disabled = true
        showErrors(form, {})

        try {
            const response = await fetch(form.action, {
                method: "POST",
                headers: {
                    Accept: "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                },
                body: new FormData(form),
            })
            const payload = await response.json()

            if (!response.ok) {
                showErrors(form, payload.errors)
                return
            }

            updateDeliverableUi(payload.deliverable)
            const workspace = form.closest("[data-deliverable-workspace]")
            const success = workspace.querySelector("[data-save-success]")
            success.textContent = payload.message
            success.classList.remove("hidden")
            switchPanel(workspace, form.dataset.savePanel || "overview")
            window.setTimeout(() => success.classList.add("hidden"), 2200)
        } catch (error) {
            showErrors(form, { save: ["The deliverable could not be saved. Please try again."] })
        } finally {
            button.disabled = false
        }
    })

    dialog.addEventListener("submit", async (event) => {
        const form = event.target.closest("[data-task-create-form]")
        if (!form) {
            return
        }

        event.preventDefault()
        const button = form.querySelector("[data-save-task]")
        button.disabled = true
        showTaskErrors(form, {})

        try {
            const response = await fetch(form.action, {
                method: "POST",
                headers: {
                    Accept: "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                },
                body: new FormData(form),
            })
            const payload = await response.json()

            if (!response.ok) {
                showTaskErrors(form, payload.errors)
                return
            }

            const workspace = form.closest("[data-deliverable-workspace]")
            const target = form.dataset.taskTarget || "advanced"
            const listSelector = {
                overview: "[data-overview-task-list]",
                edit: "[data-edit-task-list]",
                advanced: "[data-advanced-task-list]",
            }[target]
            const emptySelector = {
                overview: "[data-overview-task-empty]",
                edit: "[data-edit-task-empty]",
                advanced: "[data-advanced-task-empty]",
            }[target]
            const countSelector = {
                overview: "[data-overview-task-count]",
                edit: "[data-edit-task-count]",
                advanced: "[data-advanced-task-count]",
            }[target]

            const list = workspace.querySelector(listSelector)
            workspace.querySelector(emptySelector)?.remove()

            const row = document.createElement("div")
            row.className = "border-default-200 flex items-start justify-between gap-3 rounded-xl border p-3"
            row.innerHTML = `
                <div class="min-w-0">
                    <p class="truncate font-medium">${escapeHtml(payload.task.title)}</p>
                    <p class="text-default-400 mt-1 text-xs">
                        ${escapeHtml(payload.task.assignee)}${payload.task.due_date ? ` · due ${escapeHtml(payload.task.due_date)}` : ""}${payload.task.time_budget ? ` · ${escapeHtml(payload.task.time_budget)}` : ""}
                    </p>
                </div>
                <span class="badge ${escapeHtml(payload.task.status_badge_classes)} shrink-0">${escapeHtml(payload.task.status)}</span>
            `
            list?.prepend(row)

            const count = workspace.querySelector(countSelector)
            if (count) {
                const currentCount = Number.parseInt(count.textContent, 10) || 0
                count.textContent = `${currentCount + 1} total`
            }

            form.reset()
            form.elements.task_type.value = "work"
            form.elements.status.value = "Not Started"
            toggleTaskForm(form.closest("[data-task-form-container]"), false)

            const success = workspace.querySelector("[data-save-success]")
            success.textContent = payload.message
            success.classList.remove("hidden")
            switchPanel(workspace, target)
            window.setTimeout(() => success.classList.add("hidden"), 2200)
        } catch (error) {
            showTaskErrors(form, { save: ["The task could not be saved. Please try again."] })
        } finally {
            button.disabled = false
        }
    })

    document.addEventListener("keydown", (event) => {
        const trigger = event.target.closest("[data-detail-trigger]")
        const interactive = event.target.closest("a, button, input, select, textarea, form, [role=menu]")
        if (trigger && (!interactive || interactive === trigger) && (event.key === "Enter" || event.key === " ")) {
            event.preventDefault()
            openDetails(trigger)
        }
    })

    document.addEventListener("submit", (event) => {
        const form = event.target.closest("[data-board-move-form]")
        if (!form) {
            return
        }

        const statusInput = form.querySelector('input[name="lifecycle_status"]')
        if (!statusInput || statusInput.value !== "In Production") {
            return
        }

        const card = form.closest("[data-card]")
        if (!card || isCardReadyForProduction(card)) {
            return
        }

        event.preventDefault()
        dispatchProductionReadiness(card)
    })

    dialog.querySelectorAll("[data-dialog-close]").forEach((button) => {
        button.addEventListener("click", () => dialog.close())
    })

    dialog.addEventListener("click", (event) => {
        if (event.target === dialog) {
            dialog.close()
        }
    })

    dialog.addEventListener("close", () => {
        content.replaceChildren()
        currentDeliverableId = null
        returnFocus?.focus()
    })
}

async function handleDrop(board, evt, token) {
    const card = evt.item
    const target = evt.to
    const url = card.getAttribute("data-update-url")
    const status = target.getAttribute("data-status")

    // Nothing meaningful changed (same column, same position).
    if (evt.to === evt.from && evt.oldIndex === evt.newIndex) {
        return
    }

    const orderedIds = Array.from(target.querySelectorAll("[data-card]"))
        .map((el) => Number(el.getAttribute("data-deliverable-id")))

    syncEmptyStates(board)
    updateCounts(board)
    hideBoardAlert(board)

    try {
        const response = await fetch(url, {
            method: "PATCH",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": token,
                "X-Requested-With": "XMLHttpRequest",
            },
            body: JSON.stringify({ lifecycle_status: status, ordered_ids: orderedIds }),
        })

        if (!response.ok) {
            const payload = await response.json().catch(() => null)
            const message = firstErrorMessage(payload) || payload?.message || `Board update failed (${response.status})`
            throw new Error(message)
        }

        const payload = await response.json()
        card.setAttribute("data-current-status", payload.lifecycle_status)
        card.setAttribute("data-allowed-targets", (payload.allowed_targets || []).join("|"))
    } catch (error) {
        console.error(error)
        revertMove(evt)
        syncEmptyStates(board)
        updateCounts(board)
        showBoardAlert(board, error.message || "The deliverable could not be moved.")
    }
}

function revertMove(evt) {
    const sourceList = evt.from
    const movedCard = evt.item
    const sourceCards = Array.from(sourceList.querySelectorAll("[data-card]"))
    const beforeCard = sourceCards[evt.oldIndex] || null

    sourceList.insertBefore(movedCard, beforeCard)
}

function firstErrorMessage(payload) {
    const errors = Object.values(payload?.errors || {}).flat()
    return errors[0] || null
}

/** Show the "No deliverables" placeholder only when a column list is empty. */
function syncEmptyStates(board) {
    board.querySelectorAll("[data-board-column]").forEach((column) => {
        const list = column.querySelector("[data-board-list]")
        const placeholder = column.querySelector("[data-empty-state]")
        if (!placeholder) {
            return
        }
        placeholder.classList.toggle("hidden", list.querySelector("[data-card]") !== null)
    })
}

/** Recompute each column's count badge from its current card count. */
function updateCounts(board) {
    board.querySelectorAll("[data-board-column]").forEach((column) => {
        const count = column.querySelectorAll("[data-card]").length
        const badge = column.querySelector("[data-count]")
        if (badge) {
            badge.textContent = count
        }
    })
}

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", () => {
        initBoard()
        initDeliverableDetails()
    })
} else {
    initBoard()
    initDeliverableDetails()
}
