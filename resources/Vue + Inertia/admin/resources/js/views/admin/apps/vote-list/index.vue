<template>
  <PageBreadcrumb title="Vote List" subtitle="Apps" />

  <BRow class="d-flex justify-content-center">
    <BCol xxl="10">
      <BCard no-body>
        <BCardHeader class="border-light justify-content-between d-flex flex-wrap gap-2">
          <div class="app-search">
            <input type="text" class="form-control" placeholder="Search topics..." v-model="search" />
            <Icon icon="search" class="app-search-icon text-muted" />
          </div>

          <div class="d-flex align-items-center gap-2 flex-wrap">
            <span class="me-2 fw-semibold">Filter By:</span>

            <div class="app-search">
              <select class="form-select form-control my-1 my-md-0">
                <option>Sort By</option>
                <option value="latest">Latest</option>
                <option value="popular">Popular</option>
                <option value="low">Low Votes</option>
                <option value="high">High Votes</option>
              </select>
              <Icon icon="filter-2" class="app-search-icon text-muted" />
            </div>

            <div class="app-search">
              <select class="form-select form-control my-1 my-md-0">
                <option>Vote Status</option>
                <option value="Voted">Voted</option>
                <option value="Not Voted">Not Voted</option>
                <option value="Pending">Pending</option>
                <option value="Disqualified">Disqualified</option>
              </select>
              <Icon icon="circle-check" class="app-search-icon text-muted" />
            </div>

            <BButton variant="success" type="button"> Add New Topics </BButton>
          </div>
        </BCardHeader>

        <BCardBody class="p-0">
          <div v-for="(item, idx) in filteredList" :key="idx" :class="['px-4 py-3', idx !== filteredList.length - 1 ? 'border-bottom border-dashed' : '']">
            <VoteListItem :item="item" />
          </div>
        </BCardBody>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BButton, BCard, BCardBody, BCardHeader, BCol, BRow } from 'bootstrap-vue-next'
import { computed, ref } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { voteListData, type VoteListItemType } from './components/data'
import VoteListItem from './components/VoteListItem.vue'

const search = ref('')

const filteredList = computed<VoteListItemType[]>(() => {
  return voteListData.filter((item: VoteListItemType) => item.title.toLowerCase().includes(search.value.toLowerCase()))
})
</script>
