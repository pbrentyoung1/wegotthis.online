<template>
  <div class="card">
    <div class="card-header block">
      <h4 class="card-title mb-1.25">Flatpickr</h4>
      <p class="text-default-400">Lightweight, powerful javascript datetimepicker with no dependencies</p>
    </div>
    <div class="card-body">
      <h4 class="card-title mb-7.5 text-sm">Datepicker</h4>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
        <div>
          <h5 class="mb-2 block text-sm font-semibold">Basic</h5>
          <p class="text-default-500">Set options <code>&#123; dateFormat: "d M, Y" &#125;</code></p>
        </div>
        <div>
          <FlatPickr placeholder="Select date" class="form-input" v-model="basicDate" :config="{ dateFormat: 'd M, Y', defaultDate: 'today' }" />
        </div>
      </div>

      <hr class="border-default-300 my-7.5 border-dashed" />

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
        <div>
          <h5 class="mb-2 block text-sm font-semibold">DateTime</h5>
          <p class="text-default-500">Set options <code>&#123; dateFormat: "d.m.y", enableTime: true &#125;</code></p>
        </div>
        <div>
          <FlatPickr class="form-input" v-model="dateTimeDate" :config="{ dateFormat: 'd.m.y h:i ', enableTime: true, defaultDate: 'today' }" />
        </div>
      </div>

      <hr class="border-default-300 my-7.5 border-dashed" />

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
        <div>
          <h5 class="mb-2 block text-sm font-semibold">Human-Friendly Dates</h5>
          <p class="text-default-500">Set options <code>&#123; altFormat: "F j, Y", dateFormat: "Y-m-d" &#125;</code></p>
        </div>
        <div>
          <FlatPickr
            v-model="humanFriendlyDate"
            class="form-input"
            :config="{
              altInput: true,
              altFormat: 'F j, Y',
              dateFormat: 'Y-m-d',
              defaultDate: 'today',
            }"
          />
        </div>
      </div>

      <hr class="border-default-300 my-7.5 border-dashed" />

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
        <div>
          <h5 class="mb-2 block text-sm font-semibold">MinDate and MaxDate</h5>
          <p class="text-default-500">Set options <code>&#123; minDate: "25 12, 2021", maxDate: "29 12, 2021" &#125;</code></p>
        </div>
        <div>
          <FlatPickr
            class="form-input"
            v-model="minAndMaxDate"
            placeholder="Select Date"
            :config="{
              dateFormat: 'd M, Y',
              minDate: '25 12, 2021',
              maxDate: '29 12, 2021',
            }"
          />
        </div>
      </div>

      <hr class="border-default-300 my-7.5 border-dashed" />

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
        <div>
          <h5 class="mb-2 block text-sm font-semibold">Default Date</h5>
          <p class="text-default-500">
            Set
            <code> defaultDate="..."</code>
            .
          </p>
        </div>
        <div>
          <FlatPickr placeholder="Select date" class="form-input" v-model="basicDate" :config="{ dateFormat: 'd M, Y', defaultDate: '25 12,2021' }" />
        </div>
      </div>

      <hr class="border-default-300 my-7.5 border-dashed" />

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
        <div>
          <h5 class="mb-2 block text-sm font-semibold">Disabling Dates</h5>
          <p class="text-default-500">
            Set options
            <code> disable="..."</code>
            .
          </p>
        </div>
        <div>
          <FlatPickr placeholder="Select date" class="form-input" v-model="disableDate" :config="{ dateFormat: 'd M, Y', defaultDate: 'today', disable: ['15 12,2025'] }" />
        </div>
      </div>

      <hr class="border-default-300 my-7.5 border-dashed" />

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
        <div>
          <h5 class="mb-2 block text-sm font-semibold">Selecting Multiple Dates</h5>
          <p class="text-default-500">
            Set options
            <code>mode="multiple"</code>
            .
          </p>
        </div>
        <div>
          <FlatPickr placeholder="Select Multiple dates" class="form-input" v-model="multiDate" :config="{ dateFormat: 'd M, Y', defaultDate: 'today', mode: 'multiple' }" />
        </div>
      </div>

      <hr class="border-default-300 my-7.5 border-dashed" />

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
        <div>
          <h5 class="mb-2 block text-sm font-semibold">Range</h5>
          <p class="text-default-500">
            Set options <code>&#123; mode: "range" &#125;</code>
            .
          </p>
        </div>
        <div>
          <FlatPickr v-model="rangeDate" class="form-input" :config="{ dateFormat: 'd M, Y', mode: 'range' }" />
        </div>
      </div>

      <hr class="border-default-300 my-7.5 border-dashed" />

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
        <div>
          <h5 class="mb-2 block text-sm font-semibold">Week Numbers</h5>
          <p class="text-default-500">
            Set options
            <code>weekNumbers:true</code>
            .
          </p>
        </div>
        <div>
          <FlatPickr v-model="weeklyDate" class="form-input" :config="{ dateFormat: 'd M, Y', defaultDate: 'today', weekNumbers: true }" />
        </div>
      </div>

      <hr class="border-default-300 my-7.5 border-dashed" />

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
        <div>
          <h5 class="mb-2 block text-sm font-semibold">Inline</h5>
          <p class="text-default-500">
            Set options
            <code> inline:true</code>
            .
          </p>
        </div>
        <div>
          <FlatPickr v-model="inlineDate" class="form-input" :config="{ dateFormat: 'd M, Y', defaultDate: 'today', inline: true }" />
        </div>
      </div>
    </div>

    <div class="border-default-300 border-t"></div>

    <div class="card-body">
      <h4 class="card-title mb-7.5">Timepicker</h4>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
        <div>
          <h5 class="mb-2 block text-sm font-semibold">Timepicker</h5>
          <p class="text-default-500">Set <code>enableTime: true, noCalendar: true, dateFormat: "H:i"</code></p>
        </div>
        <div>
          <FlatPickr
            v-model="timePickr"
            class="form-input"
            :config="{
              enableTime: true,
              noCalendar: true,
              defaultDate: '16:45',
              dateFormat: 'H:i',
            }"
          />
        </div>
      </div>

      <hr class="border-default-300 my-7.5 border-dashed" />

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
        <div>
          <h5 class="mb-2 block text-sm font-semibold">24-hour Time Picker</h5>
          <p class="text-default-500">Set options <code>{minTime: "16:00", maxTime: "22:30"}</code></p>
        </div>
        <div>
          <FlatPickr
            v-model="hourTimePickr"
            class="form-input"
            :config="{
              enableTime: true,
              noCalendar: true,
              dateFormat: 'H:i',
              defaultDate: '16:45',
              minTime: '16:00',
              maxTime: '22:30',
            }"
          />
        </div>
      </div>

      <hr class="border-default-300 my-7.5 border-dashed" />

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
        <div>
          <h5 class="mb-2 block text-sm font-semibold">Time Picker w/ Limits</h5>
          <p class="text-default-500">
            Set
            <code>data-provider="timepickr" data-min-time="Min.Time" data-max-time="Max.Time"</code>
            attribute.
          </p>
        </div>
        <div>
          <FlatPickr
            v-model="limitTimePickr"
            class="form-input"
            :config="{
              maxTime: '16:00',
              minTime: '13:00',
              enableTime: true,
              noCalendar: true,
              defaultDate: '16:45',
              dateFormat: 'H:i',
            }"
          />
        </div>
      </div>

      <hr class="border-default-300 my-7.5 border-dashed" />

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
        <div>
          <h5 class="mb-2 block text-sm font-semibold">Preloading Time</h5>
          <p class="text-default-500">Set options <code>{defaultDate: "16:45"}</code></p>
        </div>
        <div>
          <FlatPickr
            v-model="preloadingTimePickr"
            class="form-input"
            :config="{
              enableTime: true,
              noCalendar: true,
              dateFormat: 'H:i',
              defaultDate: '16:45',
            }"
          />
        </div>
      </div>

      <hr class="border-default-300 my-7.5 border-dashed" />

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
        <div>
          <h5 class="mb-2 block text-sm font-semibold">Inline</h5>
          <p class="text-default-500">
            Set options
            <code>{inline: true, enableTime: true, noCalendar: true}</code>
          </p>
        </div>
        <div>
          <FlatPickr
            v-model="timePickr"
            class="form-input"
            :config="{
              enableTime: true,
              noCalendar: true,
              inline: true,
            }"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import FlatPickr from 'vue-flatpickr-component'
const basicDate = ref('')
const dateTimeDate = ref('')
const humanFriendlyDate = ref('')
const minAndMaxDate = ref('')
const multiDate = ref('')
const rangeDate = ref('')
const weeklyDate = ref('')
const inlineDate = ref('')
const disableDate = ref('')
const timePickr = ref('')
const hourTimePickr = ref('')
const limitTimePickr = ref('')
const preloadingTimePickr = ref('')
</script>

<style></style>
