<template>
  <div class="card">
    <div class="card-header">
      <div>
        <h4 class="card-title mb-1.5">Flags Listing (SVG)</h4>
        <p class="text-default-400">We offer a set of scalable SVG flags, perfect for language selectors and international content.</p>
      </div>

      <div class="relative flex items-center">
        <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
          <Icon icon="search" class="text-default-400 text-lg" />
        </div>

        <input type="search" id="countrySearch" class="form-input w-57.5 ps-10" placeholder="Search country..." v-model="globalFilter" />
      </div>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table-bordered table w-full text-center align-middle">
          <thead>
            <tr class="text-xs font-bold">
              <th>Flag</th>
              <th>Country Name</th>
              <th>Path</th>
              <th>Flag</th>
              <th>Country Name</th>
              <th>Path</th>
            </tr>
          </thead>

          <tbody v-if="rows.length">
            <tr v-for="(pair, idx) in rows" :key="idx">
              <template v-for="country in pair" :key="country.code">
                <td>
                  <img :src="country.flag" :alt="country.code" width="18" height="18" class="rounded h-4.5 mx-auto" />
                </td>
                <td>{{ country.name }}</td>
                <td>assets/images/flags/{{ country.code }}.svg</td>
              </template>

              <template v-if="pair.length === 1">
                <td></td>
                <td></td>
                <td></td>
              </template>
            </tr>
          </tbody>

          <tbody v-else>
            <tr>
              <td colspan="6" class="text-center text-muted">No records found</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed, ref } from 'vue'
import Icon from '~/components/wrappers/Icon.vue'
import { countryData, type CountryType } from './data'

const globalFilter = ref('')

const filteredCountries = computed(() => countryData.filter((c) => c.name.toLowerCase().includes(globalFilter.value.toLowerCase())))

const rows = computed<CountryType[][]>(() => {
  const result: CountryType[][] = []
  for (let i = 0; i < filteredCountries.value.length; i += 2) {
    result.push(filteredCountries.value.slice(i, i + 2))
  }
  return result
})
</script>
