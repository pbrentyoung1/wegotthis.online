<template>
  <div
    :class="[
      'px-7.5 py-5',
      {
        'border-b border-dashed border-default-300': voteListData.length !== idx,
      },
    ]"
  >
    <div class="flex items-center gap-7.5">
      <div>
        <div class="flex flex-col items-stretch gap-1.5 text-center">
          <button type="button" class="btn p-0">
            <Icon icon="chevron-up" :class="['text-xl', item.userVote === 'up' ? 'text-danger' : 'text-primary']" />
          </button>

          <h5 class="text-base font-bold">{{ item.votes }}</h5>

          <button type="button" class="btn p-0">
            <Icon icon="chevron-down" :class="['text-xl', item.userVote === 'down' ? 'text-danger' : 'text-primary']" />
          </button>
        </div>
      </div>

      <div>
        <h4 class="mb-1.25 text-md">
          <RouterLink to="" class="hover:text-primary">
            {{ item.title }}
          </RouterLink>
        </h4>

        <p class="mb-2.5 text-sm text-default-400">
          {{ item.description }}
        </p>

        <p class="mb-1.25 flex flex-wrap items-center gap-base text-default-400">
          <span class="flex items-center gap-1.25">
            <img :src="item.user.image" class="size-6 rounded-full" />
            <RouterLink to="" class="font-semibold hover:text-primary">
              {{ item.user.name }}
            </RouterLink>
          </span>

          <span class="flex items-center gap-1">
            <Icon icon="calendar" />
            <span>Posted on: {{ item.postedOn }}</span>
          </span>

          <span class="flex items-center gap-1">
            <Icon icon="tag" />
            <span class="badge bg-light font-semibold text-primary">
              {{ item.category }}
            </span>
          </span>

          <span class="flex items-center gap-1">
            <Icon icon="messages" />
            <RouterLink to="" class="text-sm hover:text-primary"> Comments: {{ item.comments }} </RouterLink>
          </span>

          <span class="flex items-center gap-1">
            <Icon icon="clock" />
            Ends in: {{ item.endsIn }}
          </span>

          <span class="flex items-center gap-1">
            <Icon icon="users" />
            Votes: {{ item.votes }}
          </span>

          <span class="flex items-center gap-1">
            <Icon icon="lock" />
            <span :class="['badge font-semibold text-white', item.status === 'closed' ? 'bg-warning' : item.status === 'ending-soon' ? 'bg-info' : 'bg-success']">
              {{ toPascalCase(item.status) }}
            </span>
          </span>
        </p>
      </div>

      <span v-if="item.userVote" class="ms-auto text-4xl text-success/25">
        <Icon icon="checks" />
      </span>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import { toPascalCase } from '~/utils/helpers'
import type { VoteListItemType } from './data'
import { voteListData } from './data'

defineProps<{
  item: VoteListItemType
  idx: number
}>()
</script>
