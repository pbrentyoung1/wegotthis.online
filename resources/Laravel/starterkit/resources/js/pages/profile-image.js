import Cropper from 'cropperjs'
import 'cropperjs/dist/cropper.css'

document.addEventListener('DOMContentLoaded', () => {
    const avatarInput = document.getElementById('avatar-file-input')
    const bannerInput = document.getElementById('banner-file-input')
    if (!avatarInput && !bannerInput) return

    let cropper = null
    let currentUploadUrl = null
    let currentField = null
    let currentIsBanner = false

    const modal = document.getElementById('crop-modal')
    const modalBackdrop = document.getElementById('crop-modal-backdrop')
    const modalTitle = document.getElementById('crop-modal-title')
    const cropImg = document.getElementById('crop-source')
    const saveBtn = document.getElementById('crop-save')
    const saveBtnLabel = document.getElementById('crop-save-label')

    function openModal(file, { url, field, title, aspectRatio, isBanner }) {
        currentUploadUrl = url
        currentField = field
        currentIsBanner = isBanner || false
        modalTitle.textContent = title
        modal.classList.toggle('crop-circle', !isBanner)
        modal.classList.toggle('crop-banner', !!isBanner)

        const reader = new FileReader()
        reader.onload = (e) => {
            cropImg.src = e.target.result
            modal.classList.remove('hidden')
            document.body.style.overflow = 'hidden'

            // Destroy any previous instance before creating a new one
            if (cropper) {
                cropper.destroy()
                cropper = null
            }

            // Defer creation until the image is visible/laid out
            requestAnimationFrame(() => {
                cropper = new Cropper(cropImg, {
                    aspectRatio,
                    viewMode: 1,
                    autoCropArea: 0.85,
                    responsive: true,
                    background: false,
                    guides: true,
                    center: true,
                    highlight: false,
                })
            })
        }
        reader.readAsDataURL(file)
    }

    function closeModal() {
        modal.classList.add('hidden')
        document.body.style.overflow = ''
        if (cropper) {
            cropper.destroy()
            cropper = null
        }
        cropImg.src = ''
        if (avatarInput) avatarInput.value = ''
        if (bannerInput) bannerInput.value = ''
        setSaving(false)
    }

    function setSaving(saving) {
        saveBtn.disabled = saving
        saveBtnLabel.textContent = saving ? 'Saving…' : 'Save'
    }

    // File input handlers
    avatarInput?.addEventListener('change', (e) => {
        const file = e.target.files[0]
        if (!file) return
        openModal(file, {
            url: avatarInput.dataset.uploadUrl,
            field: 'avatar',
            title: 'Crop profile photo',
            aspectRatio: 1,
        })
    })

    bannerInput?.addEventListener('change', (e) => {
        const file = e.target.files[0]
        if (!file) return
        openModal(file, {
            url: bannerInput.dataset.uploadUrl,
            field: 'banner',
            title: 'Crop cover image',
            aspectRatio: 4,
            isBanner: true,
        })
    })

    // Zoom controls
    document.getElementById('crop-zoom-in')?.addEventListener('click', () => cropper?.zoom(0.1))
    document.getElementById('crop-zoom-out')?.addEventListener('click', () => cropper?.zoom(-0.1))
    document.getElementById('crop-rotate-left')?.addEventListener('click', () => cropper?.rotate(-90))
    document.getElementById('crop-rotate-right')?.addEventListener('click', () => cropper?.rotate(90))

    // Cancel / backdrop
    document.querySelectorAll('.crop-cancel').forEach(btn => btn.addEventListener('click', closeModal))
    modalBackdrop?.addEventListener('click', closeModal)

    // Save — extract canvas, upload via fetch
    saveBtn?.addEventListener('click', () => {
        if (!cropper) return

        const maxWidth = currentIsBanner ? 1920 : 800
        const maxHeight = currentIsBanner ? 480 : 800

        setSaving(true)

        cropper.getCroppedCanvas({ maxWidth, maxHeight, imageSmoothingQuality: 'high' })
            .toBlob((blob) => {
                const fd = new FormData()
                fd.append(currentField, blob, 'image.png')
                fd.append('_token', document.querySelector('meta[name="csrf-token"]').content)

                fetch(currentUploadUrl, { method: 'POST', body: fd })
                    .then((res) => {
                        if (!res.ok) throw new Error('Upload failed')
                        return res.json()
                    })
                    .then(({ url }) => {
                        if (currentIsBanner) {
                            // Swap placeholder gradient for the real image
                            const placeholder = document.getElementById('banner-placeholder')
                            const img = document.getElementById('banner-preview-img')
                            if (placeholder) placeholder.classList.add('hidden')
                            if (img) {
                                img.src = url
                                img.classList.remove('hidden')
                            }
                        } else {
                            const img = document.getElementById('avatar-preview-img')
                            if (img) img.src = url
                        }
                        closeModal()
                    })
                    .catch(() => {
                        alert('Upload failed. Please try again.')
                        setSaving(false)
                    })
            }, 'image/png')
    })
})
