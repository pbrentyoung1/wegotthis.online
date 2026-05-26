<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Typeahead</h4>
    </div>

    <div class="card-body">
      <p class="mb-3 text-default-400">a flexible JavaScript library that provides a strong foundation for building robust typeaheads</p>
      <a class="font-semibold text-primary flex gap-1 items-center" href="https://www.npmjs.com/package/vue3-simple-typeahead" target="_blank">
        Typeahead on View Official Website
        <Icon icon="chevron-right" />
      </a>
    </div>

    <div class="card-body">
      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <h5 class="mb-2">Basic</h5>
        
          <SimpleTypeahead class="form-input" placeholder="Enter states from USA" :items="US_STATES" @selectItem="handleSelectBasic" @onInput="(e: TypeaheadInputEvent) => (basicInput = e.input)" :minInputLength="1" />
        
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <h5 class="mb-2">BloodHound (Suggestion Engine)</h5>
        
          <SimpleTypeahead class="form-input" placeholder="Enter states from USA" :items="bloodhoundItems" :minInputLength="1" @onInput="(evt: TypeaheadInputEvent) => debounceFilter(evt.input)" @selectItem="(item: string) => (basicSelection = item)" />
        
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <h5 class="mb-2">Prefetch</h5>
        
          <SimpleTypeahead class="form-input" placeholder="Enter states from USA" :items="prefetchItems" :minInputLength="1" />
        
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <h5 class="mb-2">Default Suggestions</h5>
        
          <SimpleTypeahead class="form-input" placeholder="Default Suggestions" :items="defaultSuggestions" :minInputLength="0" :minItemLength="0" />
        
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <h5 class="mb-2">Custom Template</h5>
        
          <SimpleTypeahead class="form-input" placeholder="Search For Oscar Winner" :items="OSCARS" :itemProjection="oscarProjection" :minInputLength="1" @selectItem="handleSelectCustom">
            <template #list-item-text="{ item, itemProjection, boldMatchText }">
              <div class="flex justify-between items-center">
                <div v-html="boldMatchText(itemProjection(item))" />
                <small class="text-default-400">{{ item.year }}</small>
              </div>
            </template>
          </SimpleTypeahead>
        
      </div>
      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <h5 class="mb-2">Multiple Datasets</h5>
        
          <SimpleTypeahead class="form-input" placeholder="NBA and NHL Teams" :items="multiItems" :itemProjection="multiProjection" :minInputLength="1">
            <template #list-item-text="{ item, itemProjection, boldMatchText }">
              <div class="flex justify-between items-center">
                <div v-html="boldMatchText(itemProjection(item))" />
                <small class="text-muted">{{ item.league }}</small>
              </div>
            </template>
          </SimpleTypeahead>
        
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { computed, onMounted, ref } from 'vue'
import Icon from '~/components/wrappers/Icon.vue'

type TypeaheadInputEvent = {
  input: string
}

const US_STATES = [
  'Alabama',
  'Alaska',
  'Arizona',
  'Arkansas',
  'California',
  'Colorado',
  'Connecticut',
  'Delaware',
  'Florida',
  'Georgia',
  'Hawaii',
  'Idaho',
  'Illinois',
  'Indiana',
  'Iowa',
  'Kansas',
  'Kentucky',
  'Louisiana',
  'Maine',
  'Maryland',
  'Massachusetts',
  'Michigan',
  'Minnesota',
  'Mississippi',
  'Missouri',
  'Montana',
  'Nebraska',
  'Nevada',
  'New Hampshire',
  'New Jersey',
  'New Mexico',
  'New York',
  'North Carolina',
  'North Dakota',
  'Ohio',
  'Oklahoma',
  'Oregon',
  'Pennsylvania',
  'Rhode Island',
  'South Carolina',
  'South Dakota',
  'Tennessee',
  'Texas',
  'Utah',
  'Vermont',
  'Virginia',
  'Washington',
  'West Virginia',
  'Wisconsin',
  'Wyoming',
]

const NBA_TEAMS = ['Lakers', 'Warriors', 'Celtics', 'Bulls', 'Nets']
const NHL_TEAMS = ['Bruins', 'Blackhawks', 'Maple Leafs', 'Canucks', 'Rangers']

const OSCARS = [
  { title: 'The Godfather', year: 1973 },
  { title: 'Forrest Gump', year: 1995 },
  { title: 'The Shape of Water', year: 2018 },
  { title: 'Parasite', year: 2020 },
  { title: 'CODA', year: 2022 },
]

const basicSelection = ref<string | null>(null)
const basicInput = ref('')

const bloodhoundItems = ref<string[]>([])
let bloodhoundTimer: ReturnType<typeof setTimeout> | null = null

function debounceFilter(input: string) {
  if (bloodhoundTimer) clearTimeout(bloodhoundTimer)
  bloodhoundTimer = setTimeout(() => {
    const q = input.trim().toLowerCase()
    if (!q) {
      bloodhoundItems.value = []
      return
    }
    bloodhoundItems.value = US_STATES.filter((s) => s.toLowerCase().includes(q)).slice(0, 10)
  }, 180) // small debounce
}

const prefetchItems = ref<string[]>([])
onMounted(() => {
  prefetchItems.value = US_STATES.slice()
})

const defaultSuggestions = ref(['California', 'Texas', 'Florida'])

type Movie = {
  title: string
  year: number
}

const customSelected = ref<Movie | null>(null)
function oscarProjection(item: Movie) {
  return item.title
}

type TeamItem = {
  name: string
  league: string
}

const multiItems = computed<TeamItem[]>(() => {
  const nba = NBA_TEAMS.map((t) => ({ name: t, league: 'NBA' }))
  const nhl = NHL_TEAMS.map((t) => ({ name: t, league: 'NHL' }))
  return [...nba, ...nhl]
})

function multiProjection(item: TeamItem): string {
  return item.name
}

function handleSelectBasic(item: string) {
  basicSelection.value = item
}
function handleSelectCustom(item: Movie) {
  customSelected.value = item
}
</script>
