<template>
  <div id="language-selector" class="topbar-item hs-dropdown relative sm:inline-flex hidden [--placement:bottom-right]">
    <button class="topbar-link hs-dropdown-toggle font-bold relative flex items-center" type="button" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
      <img :src="currentLanguage.flag" :alt="currentLanguage.name" class="me-3 size-4.5 rounded" id="selected-language-image" />
      <span id="selected-language-code">{{ currentLanguage.code.toUpperCase() }}</span>
    </button>

    <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-menu">
      <a href="#" @click="() => setCurrentLanguage(language)" class="dropdown-item" data-translator-lang="en" title="English" v-for="(language, idx) in languageData" :key="idx">
        <img :src="language.flag" :alt="language.name" class="me-1 size-4 rounded" height="18" data-translator-image="" />
        <span class="align-middle">{{ language.name }}</span>
      </a>
    </div>
  </div>
</template>

<script setup lang="ts">
import { storeToRefs } from 'pinia'
import { ref } from 'vue'
import { useLayout } from '~/stores/layout'

import FlagDe from '/images/flags/de.svg'
import FlagEs from '/images/flags/es.svg'
import FlagIn from '/images/flags/in.svg'
import FlagIt from '/images/flags/it.svg'
import FlagRu from '/images/flags/ru.svg'
import FlagSa from '/images/flags/sa.svg'
import FlagUs from '/images/flags/us.svg'

type LanguageType = {
  code: string
  name: string
  flag: string
  title: string
}

const languageData: LanguageType[] = [
  { code: 'EN', name: 'English', flag: FlagUs, title: 'English' },
  { code: 'DE', name: 'Deutsch', flag: FlagDe, title: 'German' },
  { code: 'IT', name: 'Italiano', flag: FlagIt, title: 'Italian' },
  { code: 'ES', name: 'Español', flag: FlagEs, title: 'Spanish' },
  { code: 'RU', name: 'Русский', flag: FlagRu, title: 'Russian' },
  { code: 'HI', name: 'हिन्दी', flag: FlagIn, title: 'Hindi' },
  { code: 'SA', name: 'عربي', flag: FlagSa, title: 'Arabic' },
]

const layoutStore = useLayout()
const { layout } = storeToRefs(layoutStore)
const { updateLayout } = layoutStore

const currentLanguage = ref<LanguageType>(languageData[0]!)
const setCurrentLanguage = (language: LanguageType) => {
  currentLanguage.value = language
  if (language.code === 'SA' && layout.value.dir === 'ltr') {
    updateLayout({ dir: 'rtl' })
  } else if (language.code !== 'SA' && layout.value.dir === 'rtl') {
    updateLayout({ dir: 'ltr' })
  }
}
</script>
