// Photo grid — detail panel and crop management
// Requires: mediaData, canManage, csrfToken, cropPresets (injected by Blade)

let currentId = null

function openMediaDetail(id) {
    currentId = id
    const file = mediaData[id]
    if (!file) return

    document.getElementById('modal-filename').textContent = file.file_name || 'Photo'
    renderModalBody(file)
    const modal = document.getElementById('media-modal')
    modal.classList.remove('hidden')
    modal.classList.add('flex')
    document.body.style.overflow = 'hidden'
}

function closeMediaDetail() {
    const modal = document.getElementById('media-modal')
    modal.classList.add('hidden')
    modal.classList.remove('flex')
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
        ? `<div class="rounded-xl border border-default-200 overflow-hidden">
                <button type="button"
                    class="w-full flex items-center justify-between px-3 py-2 text-sm text-default-500 hover:bg-default-50 transition-colors"
                    onclick="this.nextElementSibling.classList.toggle('hidden');this.querySelector('i').classList.toggle('rotate-180')">
                    <span class="font-medium">Photo details</span>
                    <i class="iconify tabler--chevron-down size-4 transition-transform"></i>
                </button>
                <div class="hidden divide-y divide-default-100">
                    ${exifLines.map(([k, v]) => `
                        <div class="flex justify-between text-sm px-3 py-1.5">
                            <span class="text-default-400">${esc(k)}</span>
                            <span class="text-default-700 font-medium">${esc(String(v))}</span>
                        </div>`).join('')}
                </div>
            </div>`
        : ''

    const tagsHtml = file.tags.length
        ? file.tags.map(t => `<span class="inline-flex items-center gap-1 rounded-full bg-primary/10 text-primary text-xs px-2 py-0.5">
            ${esc(t)}
            <button type="button" class="hover:text-danger leading-none" onclick="removeTag(${file.id},'${esc(t)}')">&times;</button>
          </span>`).join('')
        : '<span class="text-default-400 text-sm">No tags</span>'

    const cropsHtml = renderCropsSection(file)
    const deleteBtn = (canManage && file.delete_url)
        ? `<button class="btn btn-sm bg-danger/10 text-danger hover:bg-danger/20 ms-auto" onclick="deleteMedia(${file.id})">
               <i class="iconify tabler--trash me-1 size-4"></i>Delete
           </button>`
        : ''

    body.innerHTML = `
        <div class="relative group/thumb cursor-zoom-in" onclick="openLightbox('${esc(file.url)}','${esc(file.file_name)}')">
            <img alt="${esc(file.file_name)}" class="w-full rounded-xl object-contain max-h-64 bg-default-100" src="${esc(file.url)}" id="modal-image" />
            <div class="absolute inset-0 rounded-xl flex items-center justify-center bg-black/0 group-hover/thumb:bg-black/30 transition-colors">
                <span class="opacity-0 group-hover/thumb:opacity-100 transition-opacity bg-black/60 text-white text-xs font-medium px-3 py-1.5 rounded-full flex items-center gap-1.5">
                    <i class="iconify tabler--zoom-in size-4"></i>View original
                </span>
            </div>
        </div>

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

    const options = Object.entries(cropPresets).map(([key, preset]) => {
        const saved = savedCrops[key]
        const label = `${preset.label} (${preset.width}×${preset.height})${saved ? ' ✓' : ''}`
        return `<option value="${key}">${label}</option>`
    }).join('')

    const savedRows = file.crops.length
        ? file.crops.map(c => `
            <div class="flex items-center gap-2 py-1.5 border-b border-default-100 last:border-0">
                <img src="${esc(c.url)}" class="size-10 rounded object-cover shrink-0" alt="" />
                <span class="flex-1 text-sm text-default-700">${esc(c.label)}</span>
                <a class="btn btn-xs bg-light text-default-600" href="${esc(c.url)}" download="${c.platform}.jpg">
                    <i class="iconify tabler--download size-3"></i>
                </a>
            </div>`).join('')
        : ''

    return `
        <div>
            <h5 class="font-semibold text-sm mb-2">Crops for social</h5>
            <select class="form-select form-select-sm w-full" id="crop-platform-select" onchange="if(this.value) openCropTool(this.value)">
                <option value="">Choose a format to crop…</option>
                ${options}
            </select>
            ${savedRows ? `<div class="mt-3 rounded-xl border border-default-200 px-3">${savedRows}</div>` : ''}
        </div>
    `
}

async function openCropTool(platform) {
    if (!window.Cropper) {
        const { default: CropperModule } = await import('cropperjs')
        window.Cropper = CropperModule
    }

    const file = mediaData[currentId]
    if (!file) return

    const preset = cropPresets[platform]

    if (window._activeCropper) {
        window._activeCropper.destroy()
        window._activeCropper = null
    }

    const cropModal = document.getElementById('crop-modal')
    document.getElementById('crop-modal-label').textContent = `${preset.label} — ${preset.width}×${preset.height}px`
    cropModal.style.display = 'flex'

    const imgEl = document.getElementById('crop-image-el')

    const initCropper = () => {
        requestAnimationFrame(() => {
            window._activeCropper = new window.Cropper(imgEl, {
                aspectRatio: preset.width / preset.height,
                viewMode: 1,
                autoCropArea: 0.8,
                checkCrossOrigin: false,
            })
            window._activeCropPlatform = platform
        })
    }

    if (imgEl.src === file.url && imgEl.complete && imgEl.naturalWidth > 0) {
        initCropper()
    } else {
        imgEl.addEventListener('load', initCropper, { once: true })
        imgEl.src = file.url
    }
}

function zoomCrop(ratio) {
    window._activeCropper?.zoom(ratio)
}

function cancelCrop() {
    if (window._activeCropper) {
        window._activeCropper.destroy()
        window._activeCropper = null
    }
    document.getElementById('crop-modal').style.display = 'none'
    const sel = document.getElementById('crop-platform-select')
    if (sel) sel.value = ''
}

async function saveCrop() {
    const cropper = window._activeCropper
    if (!cropper) return

    const file = mediaData[currentId]
    const platform = window._activeCropPlatform
    const cropData = cropper.getData(true) // coordinates in original image pixels

    const body = new URLSearchParams({
        _token: csrfToken,
        platform,
        crop_x: cropData.x,
        crop_y: cropData.y,
        crop_w: cropData.width,
        crop_h: cropData.height,
    })

    const resp = await fetch(file.crop_url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded', 'X-CSRF-TOKEN': csrfToken },
        body,
    })

    if (resp.ok) {
        const data = await resp.json()
        const existing = file.crops.findIndex(c => c.platform === platform)
        if (existing >= 0) file.crops[existing] = data
        else file.crops.push(data)

        if (data.tags) file.tags = data.tags

        // Sync thumbnail crop badge
        const card = document.querySelector(`[data-media-id="${file.id}"]`)
        if (card) {
            let badge = card.querySelector('.crop-badge')
            if (!badge) {
                badge = document.createElement('span')
                badge.className = 'crop-badge absolute bottom-2 right-2 rounded-full bg-black/60 px-1.5 py-0.5 text-[10px] font-semibold text-white flex items-center gap-1'
                card.appendChild(badge)
            }
            badge.innerHTML = `<i class="iconify tabler--scissors size-3"></i>${file.crops.length}`
        }

        cancelCrop()
        renderModalBody(file)
    } else {
        alert('Crop failed. Please try again.')
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

    const serialized = typeof value === 'boolean' ? (value ? 1 : 0) : value
    const body = new URLSearchParams({ _token: csrfToken, _method: 'PATCH', [field]: serialized })
    await fetch(file.update_url, { method: 'POST', body })
    file[field] = value

    // Sync grid thumbnail DOM
    if (field === 'is_favorite') {
        const btn = document.querySelector(`[data-media-id="${id}"] button[onclick*="toggleFavorite"]`)
        if (btn) {
            btn.querySelector('i').className = `iconify ${value ? 'tabler--star-filled text-warning' : 'tabler--star text-default-400'} size-4`
        }
    }
    if (field === 'approved_for_use') {
        const card = document.querySelector(`[data-media-id="${id}"]`)
        if (card) {
            const badge = card.querySelector('.bg-success\\/90')
            if (value && !badge) {
                const span = document.createElement('span')
                span.className = 'absolute top-2 left-2 rounded-full bg-success/90 px-1.5 py-0.5 text-[10px] font-semibold text-white'
                span.textContent = 'Approved'
                card.appendChild(span)
            } else if (!value && badge) {
                badge.remove()
            }
        }
    }
}

async function removeTag(id, tag) {
    const file = mediaData[id]
    if (!file) return

    file.tags = file.tags.filter(t => t !== tag)
    await saveTags(id)
    renderModalBody(file)
}

async function saveTags(id) {
    const file = mediaData[id]
    if (!file) return

    const body = new URLSearchParams({ _token: csrfToken, _method: 'PATCH' })
    file.tags.forEach(t => body.append('tags[]', t))
    await fetch(file.update_url, { method: 'POST', body })
}

async function addTag(event, id) {
    if (event.key !== 'Enter') return
    const input = event.target
    const file = mediaData[id]
    if (!file) return

    const newTags = input.value.split(',').map(t => t.trim()).filter(t => t && !file.tags.includes(t))
    if (!newTags.length) return

    file.tags = [...file.tags, ...newTags]
    await saveTags(id)
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

// Expose functions called from inline onclick attributes
window.openMediaDetail = openMediaDetail
window.closeMediaDetail = closeMediaDetail
window.toggleFavorite = toggleFavorite
window.openCropTool = openCropTool
window.cancelCrop = cancelCrop
window.saveCrop = saveCrop
window.zoomCrop = zoomCrop
window.patchField = patchField
window.addTag = addTag
window.removeTag = removeTag
window.deleteMedia = deleteMedia

function openLightbox(url, alt) {
    const modal = document.getElementById('lightbox-modal')
    const img = document.getElementById('lightbox-img')
    img.src = url
    img.alt = alt || ''
    modal.classList.remove('hidden')
    modal.classList.add('flex')
    document.body.style.overflow = 'hidden'
}

function closeLightbox() {
    const modal = document.getElementById('lightbox-modal')
    modal.classList.add('hidden')
    modal.classList.remove('flex')
    // Restore scroll only if detail panel is also closed
    if (document.getElementById('media-modal').classList.contains('hidden')) {
        document.body.style.overflow = ''
    }
}

window.openLightbox = openLightbox
window.closeLightbox = closeLightbox

// Close on Escape
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
        if (!document.getElementById('lightbox-modal').classList.contains('hidden')) {
            closeLightbox()
        } else {
            closeMediaDetail()
        }
    }
})
