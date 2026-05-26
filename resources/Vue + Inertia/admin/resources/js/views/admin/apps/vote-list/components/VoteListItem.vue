<template>
  <div class="d-flex gap-4 align-items-center">
    <div>
      <div class="vstack gap-1 text-center">
        <div>
          <button class="btn p-0" :class="props.item.userVote === 'up' ? 'text-danger' : 'btn-link'">
            <Icon icon="chevron-up" class="fs-xxl" />
          </button>
        </div>

        <h5 class="fw-bold m-0 fs-lg">{{ votes }}</h5>

        <div>
          <button class="btn p-0" :class="props.item.userVote === 'down' ? 'text-danger' : 'btn-link'">
            <Icon icon="chevron-down" class="fs-xxl" />
          </button>
        </div>
      </div>
    </div>

    <div class="flex-grow-1">
      <h4 class="fs-md mb-1">
        <Link href="" class="link-reset">{{ item.title }}</Link>
      </h4>

      <p class="text-muted mb-2">{{ item.description }}</p>

      <p class="d-flex flex-wrap gap-3 text-muted mb-1 align-items-center fs-base">
        <span class="d-flex align-items-center gap-1">
          <img :src="item.user.image" height="24" width="24" alt="" class="img-fluid avatar-xs rounded-circle" />
          <Link href="" class="link-reset fw-semibold">{{ item.user.name }}</Link>
        </span>

        <span class="d-flex align-items-center gap-1">
          <Icon icon="calendar" />
          <span>Posted on: {{ item.postedOn }}</span>
        </span>

        <span class="d-flex align-items-center gap-1">
          <Icon icon="tag" />
          <span class="badge bg-light text-primary">{{ item.category }}</span>
        </span>

        <span class="d-flex align-items-center gap-1">
          <Icon icon="messages" />
          <Link href="" class="link-reset">Comments: {{ item.comments }}</Link>
        </span>

        <span class="d-flex align-items-center gap-1">
          <Icon icon="clock" />
          <span>Ends in: {{ item.endsIn }}</span>
        </span>

        <span class="d-flex align-items-center gap-1">
          <Icon icon="users" />
          <span>Votes: {{ votes }}</span>
        </span>

        <span class="d-flex align-items-center gap-1">
          <Icon icon="lock" />
          <BBadge :variant="item.status === 'closed' ? 'warning' : item.status === 'ending-soon' ? 'info' : 'success'">
            {{ toPascalCase(item.status) }}
          </BBadge>
        </span>
      </p>
    </div>

    <div v-if="props.item.userVote">
      <BTooltip placement="top">
        Thank you for voting
        <template #target>
          <Icon icon="checks" class="ms-auto fs-36 text-success text-opacity-25" />
        </template>
      </BTooltip>
    </div>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BBadge, BTooltip } from 'bootstrap-vue-next'
import { ref } from 'vue'
import Icon from '@/components/wrappers/Icon.vue'
import { toPascalCase } from '@/utils/helpers'
import type { VoteListItemType } from './data'

const props = defineProps<{
  item: VoteListItemType
}>()

const votes = ref<number>(props.item.votes ?? 0)
</script>
