import Quill from "quill"

const toolbar = [
    [{ header: [false, 2, 3] }],
    ["bold", "italic", "underline"],
    [{ list: "ordered" }, { list: "bullet" }],
    ["link", "blockquote"],
    ["clean"],
]

document.querySelectorAll("[data-rich-text-editor]").forEach((element) => {
    const input = element.previousElementSibling
    if (!input?.matches("[data-rich-text-input]")) return
    const wrapper = element.closest("[data-rich-text-wrapper]")

    const editor = new Quill(element, {
        theme: "snow",
        placeholder: element.dataset.placeholder || "",
        formats: ["header", "bold", "italic", "underline", "list", "link", "blockquote"],
        modules: { toolbar },
    })

    const value = input.value.trim()
    if (value) {
        try {
            const delta = JSON.parse(value)
            if (Array.isArray(delta.ops)) editor.setContents(delta)
            else editor.setText(value)
        } catch {
            editor.setText(value)
        }
    }

    const sync = () => {
        input.value = editor.getText().trim() ? JSON.stringify(editor.getContents()) : ""
    }

    editor.on("text-change", sync)
    input.addEventListener("focus", () => editor.focus())
    input.form?.addEventListener("submit", sync)

    const emojiToggle = wrapper?.querySelector("[data-emoji-toggle]")
    const emojiPicker = wrapper?.querySelector("[data-emoji-picker]")

    emojiToggle?.addEventListener("click", () => {
        const opening = emojiPicker.classList.contains("hidden")
        document.querySelectorAll("[data-emoji-picker]").forEach((picker) => picker.classList.add("hidden"))
        if (opening) emojiPicker.classList.remove("hidden")
        emojiToggle.setAttribute("aria-expanded", opening ? "true" : "false")
    })

    emojiPicker?.querySelectorAll("[data-emoji]").forEach((button) => {
        button.addEventListener("click", () => {
            const selection = editor.getSelection(true)
            editor.insertText(selection?.index ?? editor.getLength() - 1, button.dataset.emoji, "user")
            emojiPicker.classList.add("hidden")
            emojiToggle.setAttribute("aria-expanded", "false")
            sync()
            editor.focus()
        })
    })
})

document.addEventListener("click", (event) => {
    if (event.target.closest("[data-rich-text-wrapper]")) return
    document.querySelectorAll("[data-emoji-picker]").forEach((picker) => picker.classList.add("hidden"))
    document.querySelectorAll("[data-emoji-toggle]").forEach((toggle) => toggle.setAttribute("aria-expanded", "false"))
})
