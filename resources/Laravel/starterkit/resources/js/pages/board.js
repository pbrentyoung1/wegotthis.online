import Sortable from "sortablejs"

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
                handleDrop(board, evt, token)
            },
        })
    })

    syncEmptyStates(board)
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
            throw new Error(payload?.message || `Board update failed (${response.status})`)
        }

        const payload = await response.json()
        card.setAttribute("data-current-status", payload.lifecycle_status)
        card.setAttribute("data-allowed-targets", (payload.allowed_targets || []).join("|"))
    } catch (error) {
        console.error(error)
        // Reload to restore a server-consistent state if the save failed.
        window.location.reload()
    }
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
    document.addEventListener("DOMContentLoaded", initBoard)
} else {
    initBoard()
}
