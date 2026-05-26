<template>
  <PageBreadcrumb title="Calendar" subtitle="Apps" />

  <div class="flex lg:h-[calc(100vh-192px)]">
    <div class="card hidden h-full lg:flex">
      <div class="card-body">
        <button class="btn w-full bg-primary text-white" data-hs-overlay="#event-modal">
          <Icon icon="plus" class="align-middle" />
          Create New Event
        </button>

        <div id="external-events" ref="externalEl">
          <p class="mt-2.5 mb-5 text-xs text-default-400 italic">Drag and drop your event or click in the calendar</p>

          <div v-for="(event, idx) in externalEventData" :key="idx" :data-class="event.dataClass" :class="`external-event fc-event my-1.5 rounded px-4 py-2 font-semibold ${event.className}`">
            <Icon icon="circle-filled" class="me-2" />
            {{ event.title }}
          </div>
        </div>
      </div>
    </div>

    <div class="card h-full flex-1">
      <div class="card-header inline-flex lg:hidden">
        <button class="btn w-full bg-primary text-white" data-hs-overlay="#event-modal">
          <Icon icon="plus" class="align-middle" />
          Create New Event
        </button>
      </div>

      <div class="card-body">
        <div ref="calendarEl" id="calendar"></div>
      </div>
    </div>
  </div>

  <div id="event-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="event-modal-label">
    <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
      <div class="card w-full flex flex-col border border-default-200 shadow-2xs pointer-events-auto">
        <div class="card-header p-5">
          <h3 id="modal-title" class="font-semibold text-base text-default-800 dark:text-white">Create Event</h3>
          <button type="button" class="size-5 text-default-800" aria-label="Close" data-hs-overlay="#event-modal">
            <span class="sr-only">Close</span>
            <Icon icon="x" class="text-xl" />
          </button>
        </div>

        <form @submit.prevent="saveEvent" :class="['needs-validation', { 'was-validated': wasValidated }]" name="event-form" id="form-event" autocomplete="off">
          <div class="card-body">
            <div class="grid grid-cols-1 gap-4">
              <div>
                <label for="event-title" class="form-label">Event Name</label>
                <input type="text" id="event-title" class="form-input" placeholder="Insert Event Name" required v-model="formTitle" />
              </div>

              <div>
                <label for="event-category" class="form-label">Category</label>
                <select v-model="formCategory" class="form-input flex items-center" name="event-category" id="event-category" required>
                  <option>Select Category</option>
                  <option selected value="!text-primary">Primary</option>
                  <option value="!text-success">Success</option>
                  <option value="!text-info">Info</option>
                  <option value="!text-warning">Warning</option>
                  <option value="!text-danger">Danger</option>
                </select>
              </div>
            </div>
          </div>

          <div class="card-footer flex gap-2 md:justify-end">
            <button v-if="selectedEvent" type="button" class="btn me-auto bg-danger text-white" @click="deleteEvent">Delete</button>
            <button type="button" data-hs-overlay="#event-modal" id="btn-delete-event" class="btn bg-light hover:text-primary">Cancel</button>

            <button type="submit" id="btn-save-event" class="btn bg-primary text-white hover:bg-primary-hover">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin, { Draggable } from '@fullcalendar/interaction'
import listPlugin from '@fullcalendar/list'
import timeGridPlugin from '@fullcalendar/timegrid'
import { onMounted, ref } from 'vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { externalEventData, initialEventData } from './components/data'

const formTitle = ref('')
const formCategory = ref('bg-primary/15 text-primary')

const calendarEl = ref<HTMLElement | null>(null)
const externalEl = ref<HTMLElement | null>(null)

const calendar = ref<any>(null)
const selectedEvent = ref<any>(null)
const wasValidated = ref(false)

onMounted(() => {
  if (externalEl.value) {
    new Draggable(externalEl.value, {
      itemSelector: '.external-event',
      eventData: (el: HTMLElement) => ({
        id: new Date(),
        title: el.innerText.trim(),
        extendedProps: { category: el.dataset.class ?? '' },
        classNames: (el.dataset.class ?? '').split(' '),
      }),
    })
  }

  if (calendarEl.value) {
    calendar.value = new Calendar(calendarEl.value, {
      plugins: [dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin],
      initialView: 'dayGridMonth',
      editable: true,
      height: window.innerHeight - 240,
      droppable: true,
      selectable: true,
      events: initialEventData,

      headerToolbar: {
        left: 'prev,next,today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth',
      },

      eventClick: (info: any) => {
        selectedEvent.value = info.event
        formTitle.value = info.event.title
        formCategory.value = info.event.extendedProps.category
        window.HSOverlay?.open('#event-modal')
      },

      dateClick: (info: any) => {
        selectedEvent.value = { id: null, start: info.date }
        formTitle.value = ''
        formCategory.value = 'bg-primary/15 text-primary'
        window.HSOverlay?.open('#event-modal')
      },
    })

    calendar.value.render()
  }
})

const saveEvent = () => {
  wasValidated.value = true

  if (!formTitle.value.trim()) return

  const calendarApi = calendar.value

  if (selectedEvent.value?.id) {
    selectedEvent.value.setProp('title', formTitle.value)
    selectedEvent.value.setExtendedProp('category', formCategory.value)
    selectedEvent.value.setProp('classNames', formCategory.value.split(' '))
  } else {
    calendarApi.addEvent({
      id: crypto.randomUUID(),
      title: formTitle.value,
      start: selectedEvent.value?.start || new Date(),

      extendedProps: {
        category: formCategory.value,
      },
      classNames: formCategory.value.split(' '),
    })
  }

  formTitle.value = ''
  wasValidated.value = false

  window.HSOverlay?.close('#event-modal')
}

const deleteEvent = () => {
  selectedEvent.value?.remove()
  window.HSOverlay?.close('#event-modal')
}
</script>

<style></style>
