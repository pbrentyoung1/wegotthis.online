<template>
  <PageBreadcrumb title="Text Diff" subtitle="Plugins" />

  <div class="grid xl:grid-cols-1 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">jsdiff</h4>
      </div>

      <div class="card-body">
        <div class="grid xl:grid-cols-2 gap-base">
          <div>
            <h5 class="mb-3 uppercase">Original Text</h5>
            <textarea class="diff-original form-textarea" rows="8" v-model="originalText" />
          </div>

          <div>
            <h5 class="mb-3 uppercase">Changed Text</h5>
            <textarea class="diff-changed form-textarea" rows="8" v-model="modifiedText" />
          </div>

          <div class="lg:col-span-2">
            <h5 class="mb-3 uppercase">Results</h5>
            <TextDifferentView :original-text="originalText" :modified-text="modifiedText" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import TextDifferentView from './components/TextDifferentView.vue'

const originalText = ref<string>(
  'On a rainy Monday morning in a small town, Emma walked into her favorite café, her umbrella dripping and her hair slightly frizzy from the storm. She always ordered the same thing: black coffee, two sugars, and a blueberry muffin. But today, someone was already sitting at her usual table by the window. It was Jack — a quiet man with a book in hand and headphones around his neck. Their eyes met for a second. He smiled and motioned for her to join him. Hesitant but intrigued, Emma accepted.'
)

const modifiedText = ref<string>(
  'On a rainy Monday morning in a small town, Emma stepped into her favorite café, her umbrella dripping and her hair slightly frizzy from the damp weather. She always ordered the same thing: black coffee with two sugars and a blueberry muffin. But today, someone was already seated at her usual window table. It was Jack — a quiet man with a book in one hand and headphones resting around his neck. Their eyes met briefly. He smiled and gestured for her to join him. Hesitant but curious, Emma agreed.'
)
</script>

<style></style>
