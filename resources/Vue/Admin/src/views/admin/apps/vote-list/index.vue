<template>
  <PageBreadcrumb title="Vote List" subtitle="Apps" />
  <div class="container">
    <div class="card">
      <div class="card-header">
        <div class="input-icon-group">
          <Icon icon="search" class="input-icon" />
          <input type="text" placeholder="Search topics..." class="form-input" />
        </div>

        <div class="flex flex-wrap items-center gap-2.5">
          <span class="me-2.5 font-semibold">Filter By:</span>

          <div class="input-icon-group">
            <Icon icon="filter-2" class="input-icon" />
            <select class="form-select">
              <option selected>Sort By</option>
              <option value="latest">Latest</option>
              <option value="popular">Popular</option>
              <option value="low">Low Votes</option>
              <option value="high">High Votes</option>
            </select>
          </div>

          <div class="input-icon-group">
            <Icon icon="circle-check" class="input-icon" />
            <select class="form-select">
              <option selected>Vote Status</option>
              <option value="voted">Voted</option>
              <option value="not-voted">Not Voted</option>
              <option value="pending">Pending</option>
              <option value="disqualified">Disqualified</option>
            </select>
          </div>

          <button class="btn bg-success text-white hover:bg-success-hover">Add New Topics</button>
        </div>
      </div>

      <div class="card-body p-0">
        <div>
          <VoteListItem v-for="(item, idx) in voteListData" :key="idx" :item="item" :idx="idx" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import VoteListItem from './components/VoteListItem.vue'

import { voteListData } from './components/data'
</script>
