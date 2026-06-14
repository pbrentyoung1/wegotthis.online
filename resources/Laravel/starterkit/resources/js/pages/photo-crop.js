// Photo grid — detail panel and crop management
// Requires: mediaData, canManage, csrfToken, cropPresets (injected by Blade)

let currentId = null

function openMediaDetail(id) {
    currentId = id
    const file = mediaData[id]
    if (!file) return

    document.getElementById('modal-filename').textContent = file.file_name || 'Photo'
    renderModalBody(file)
    document.getElementById('media-modal').classList.remove('hidden')
    document.body.style.overflow = 'hidden'
}

function closeMediaDetail() {
    document.getElementById('media-modal').classList.add('hidden')
    document.body.style.overflow = ''
    currentId = null
}

function renderModalBody(file) {
    const body = document.getElementById('modal-body')

    const exifLines = []
    if (file.exif_taken_at) exifLines.push(['Taken', file.exif_taken_at])
    if (file.exif_device_make || file.exif_device_model)
        exifLines.push(['Device', [file.exif_device_make, file.exif_device_model].filter(Boolean).join(' ')])
    if (file.exif_width && file.exif_height)
        exifLines.push(['Dimensions', `${file.exif_width} × ${file.exif_height}`])
    if (file.exif_aperture) exifLines.push(['Aperture', file.exif_aperture])
    if (file.exif_shutter_speed) exifLines.push(['Shutter', file.exif_shutter_speed])
    if (file.exif_iso) exifLines.push(['ISO', file.exif_iso])

    const exifHtml = exifLines.length
        ? `<div class="rounded-xl bg-default-50 p-3 space-y-1">
            ${exifLines.map(([k, v]) => `
                <div class="flex justify-between text-sm">
                    <span class="text-default-400">${esc(k)}</span>
                    <span class="text-default-700 font-medium">${esc(String(v))}</span>
                </div>`).join('')}
            </div>`
        : ''

    const tagsHtml = file.tags.length
        ? file.tags.map(t => `<span class="badge bg-primary/10 text-primary text-xs">${esc(t)}</span>`).join('')
        : '<span class="text-default-400 text-sm">No tags</span>'

    const cropsHtml = renderCropsSection(file)
    const deleteBtn = (canManage && file.delete_url)
        ? `<button class="btn btn-sm bg-danger/10 text-danger hover:bg-danger/20 ms-auto" onclick="deleteMedia(${file.id})">
               <i class="iconify tabler--trash me-1 size-4"></i>Delete
           </button>`
        : ''

    body.innerHTML = `
        <img alt="${esc(file.file_name)}" class="w-full rounded-xl object-contain max-h-64 bg-default-100" src="${esc(file.url)}" id="modal-image" />

        ${exifHtml}

        ${file.uploader_name ? `<p class="text-sm text-default-500">Uploaded by <strong>${esc(file.uploader_name)}</strong></p>` : ''}

        <div class="flex gap-3">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" class="form-checkbox" id="detail-favorite" ${file.is_favorite ? 'checked' : ''} onchange="patchField(${file.id},'is_favorite',this.checked)" />
                <span class="text-sm">Favorite</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" class="form-checkbox" id="detail-approved" ${file.approved_for_use ? 'checked' : ''} onchange="patchField(${file.id},'approved_for_use',this.checked)" />
                <span class="text-sm">Approved for use</span>
            </label>
            ${deleteBtn}
        </div>

        <div>
            <label class="form-label">Caption</label>
            <textarea class="form-textarea w-full" rows="2" placeholder="Write a caption…" onchange="patchField(${file.id},'caption',this.value)">${esc(file.caption || '')}</textarea>
        </div>

        <div>
            <label class="form-label">Internal notes</label>
            <textarea class="form-textarea w-full" rows="2" placeholder="Internal notes…" onchange="patchField(${file.id},'notes',this.value)">${esc(file.notes || '')}</textarea>
        </div>

        <div>
            <label class="form-label">Tags</label>
            <div class="flex flex-wrap gap-1.5 mb-2">${tagsHtml}</div>
            <input class="form-input" placeholder="Add tag and press Enter" type="text" onkeydown="addTag(event,${file.id})" />
        </div>

        ${cropsHtml}
    `
}

function renderCropsSection(file) {
    if (!canManage || !file.crop_url) return ''

    const savedCrops = {}
    file.crops.forEach(c => { savedCrops[c.platform] = c })

    const presetRows = Object.entries(cropPresets).map(([key, preset]) => {
        const saved = savedCrops[key]
        const savedHtml = saved
            ? `<img src="${esc(saved.url)}" class="size-10 rounded object-cover" alt="" />
               <span class="text-xs text-success">Saved</span>
               <button class="btn btn-xs bg-light text-default-600" onclick="openCropTool('${key}')">Re-crop</button>
               <a class="btn btn-xs bg-light text-default-600" href="${esc(saved.url)}" download="${key}.jpg">↓</a>`
            : `<button class="btn btn-xs bg-primary/10 text-primary" onclick="openCropTool('${key}')">Crop now</button>`

        return `<div class="flex items-center gap-2 py-1.5 border-b border-default-100 last:border-0">
            <span class="flex-1 text-sm">${esc(preset.label)} <span class="text-default-400 text-xs">${preset.width}×${preset.height}</span></span>
            ${savedHtml}
        </div>`
    }).join('')

    return `
        <div>
            <h5 class="font-semibold text-sm mb-2">Crops for social</h5>
            <div class="rounded-xl border border-default-200 px-3">${presetRows}</div>
            <div class="hidden mt-4" id="crop-tool-wrapper">
                <p class="text-sm font-medium mb-2" id="crop-tool-label"></p>
                <div class="relative bg-default-900 rounded-xl overflow-hidden">
                    <img id="crop-image-el" src="" class="max-h-80 w-full object-contain" />
                </div>
                <div class="flex gap-2 mt-3">
                    <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" onclick="saveCrop()">Save crop</button>
                    <button class="btn btn-sm bg-light text-default-600" onclick="cancelCrop()">Cancel</button>
                </div>
            </div>
        </div>
    `
}

async function openCropTool(platform) {
    // Lazily load Cropper.js
    if (!window.Cropper) {
        const { default: CropperModule } = await import('cropperjs')
        window.Cropper = CropperModule
    }

    const file = mediaData[currentId]
    if (!file) return

    const preset = cropPresets[platform]
    document.getElementById('crop-tool-label').textContent = `Cropping for ${preset.label} (${preset.width}×${preset.height})`
    document.getElementById('crop-tool-wrapper').classList.remove('hidden')

    const imgEl = document.getElementById('crop-image-el')
    imgEl.src = file.url

    // Destroy previous Cropper instance
    if (window._activeCropper) {
        window._activeCropper.destroy()
    }

    imgEl.onload = () => {
        window._activeCropper = new Cropper(imgEl, {
            aspectRatio: preset.width / preset.height,
            viewMode: 1,
            autoCropArea: 0.8,
        })
        window._activeCropPlatform = platform
    }
}

function cancelCrop() {
    if (window._activeCropper) {
        window._activeCropper.destroy()
        window._activeCropper = null
    }
    document.getElementById('crop-tool-wrapper').classList.add('hidden')
}

async function saveCrop() {
    const cropper = window._activeCropper
    if (!cropper) return

    const file = mediaData[currentId]
    const platform = window._activeCropPlatform
    const cropData = cropper.getData(true) // rounded integers
    const imageData = cropper.getImageData()
    const canvasData = cropper.getCanvasData()

    const body = new URLSearchParams({
        _token: csrfToken,
        platform,
        crop_x: cropData.x,
        crop_y: cropData.y,
        crop_w: cropData.width,
        crop_h: cropData.height,
        original_width: Math.round(imageData.naturalWidth),
        original_height: Math.round(imageData.naturalHeight),
        display_width: Math.round(imageData.width),
        display_height: Math.round(imageData.height),
    })

    const resp = await fetch(file.crop_url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded', 'X-CSRF-TOKEN': csrfToken },
        body,
    })

    if (resp.ok) {
        const crop = await resp.json()
        // Update local data and re-render
        const existing = file.crops.findIndex(c => c.platform === platform)
        if (existing >= 0) file.crops[existing] = crop
        else file.crops.push(crop)

        cancelCrop()
        renderModalBody(file)
    }
}

async function toggleFavorite(id, btn) {
    const file = mediaData[id]
    if (!file) return

    const resp = await fetch(file.favorite_url, {
        method: 'PATCH',
        headers: { 'X-CSRF-TOKEN': csrfToken, 'Content-Type': 'application/json' },
        body: JSON.stringify({ _method: 'PATCH' }),
    })

    if (resp.ok) {
        const data = await resp.json()
        file.is_favorite = data.is_favorite
        const icon = btn.querySelector('i')
        icon.className = `iconify ${data.is_favorite ? 'tabler--star-filled text-warning' : 'tabler--star text-default-400'} size-4`
    }
}

async function patchField(id, field, value) {
    const file = mediaData[id]
    if (!file) return

    const body = new URLSearchParams({ _token: csrfToken, _method: 'PATCH', [field]: value })
    await fetch(file.update_url, { method: 'POST', body })
    file[field] = value
}

async function addTag(event, id) {
    if (event.key !== 'Enter') return
    const input = event.target
    const tag = input.value.trim()
    if (!tag) return

    const file = mediaData[id]
    if (!file || file.tags.includes(tag)) return

    file.tags = [...file.tags, tag]
    await patchField(id, 'tags[]', file.tags.join(','))
    input.value = ''
    renderModalBody(file)
}

async function deleteMedia(id) {
    if (!confirm('Delete this photo? This cannot be undone.')) return

    const file = mediaData[id]
    if (!file?.delete_url) return

    const resp = await fetch(file.delete_url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ _token: csrfToken, _method: 'DELETE' }),
    })

    if (resp.ok) {
        closeMediaDetail()
        document.querySelector(`[data-media-id="${id}"]`)?.remove()
        delete mediaData[id]
    }
}

function esc(str) {
    return String(str ?? '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;')
}

// Close on Escape
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeMediaDetail()
})
