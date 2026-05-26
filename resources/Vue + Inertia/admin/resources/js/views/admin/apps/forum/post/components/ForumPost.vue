<template>
  <div class="d-flex gap-4 align-items-center">
    <div class="flex-grow-1">
      <div class="text-center">
        <p class="text-muted text-uppercase my-2 fw-semibold">#Development Talk</p>
        <h4 class="fs-xxl mb-3">What’s the best JavaScript framework in {{ new Date().getFullYear() }}?</h4>
      </div>

      <div class="fs-sm">
        <p>
          With the ever-evolving front-end landscape, JavaScript frameworks are at the heart of most web development stacks. In 2025, options like React, Vue 3, Angular, Svelte, SolidJS, and even newer players continue to battle for dominance in terms of performance, developer
          experience, ecosystem, and community support.
        </p>
        <p>
          React remains a popular choice due to its strong community, wide adoption, and extensive tooling, while Vue 3 continues to grow thanks to its approachable syntax and Composition API. On the other hand, Svelte and SolidJS are gaining attention for their compile-time
          optimization and ultra-fast runtime performance.
        </p>
        <p>We’d love to hear your experience: Which framework do you use and why? Are you prioritizing performance, learning curve, community support, or integration capabilities? Share your insights, real-world comparisons, and predictions for the future!</p>
      </div>
    </div>
  </div>

  <p class="d-flex flex-wrap gap-3 text-muted mt-3 mb-0 pb-3 align-items-center justify-content-between fs-sm">
    <span class="d-flex align-items-center gap-2">
      <img :src="user5" alt="avatar-5" class="img-fluid avatar-sm rounded" />
      <span class="text-body">
        <Link href="#" class="link-reset fw-semibold lh-sm d-block"> James Milton </Link>
        <span class="text-muted small">1 hour ago</span>
      </span>
    </span>
    <span class="d-flex align-items-center gap-1">
      <Icon icon="messages" />
      <Link href="#" class="link-reset"> Answers: 45 </Link>
    </span>
    <span class="d-flex align-items-center gap-1">
      <Icon icon="clock" />
      Ends in: 3 days
    </span>
    <span class="d-flex align-items-center gap-1">
      <Icon icon="users" />
      Votes: 732
    </span>
  </p>

  <div class="border-bottom border-dashed mb-3"></div>

  <form class="mb-3" @submit.prevent="submitReply">
    <div class="mb-3">
      <BFormTextarea v-model="message" class="bg-light-subtle" id="form-control-textarea" rows="4" placeholder="Enter your message..."></BFormTextarea>
    </div>
    <div class="text-end">
      <BButton type="submit" class="btn btn-secondary">
        Submit
        <Icon icon="send-2" class="align-baseline ms-1" />
      </BButton>
    </div>
  </form>

  <h4>Replies ({{ forumRepliesData.length }})</h4>
  <div class="border-bottom border-dashed my-3"></div>

  <div v-for="(reply, idx) in forumRepliesData" :key="idx" :class="['d-flex border border-dashed rounded p-3', forumRepliesData.length - 1 === idx ? 'mb-3' : 'mb-2']">
    <div class="flex-shrink-0">
      <img :src="reply.avatar" :alt="reply.author" class="avatar-sm rounded-circle shadow-sm" />
    </div>
    <div class="flex-grow-1 ms-2">
      <h5 class="mb-1">
        {{ reply.author }}
        <small class="text-muted">{{ reply.date }} · {{ reply.time }}</small>
      </h5>
      <p class="mb-2">{{ reply.message }}</p>
      <Link href="#" class="badge bg-light text-muted d-inline-flex align-items-center gap-1">
        <Icon icon="corner-up-left" class="fs-lg" />
        Reply
      </Link>

      <div v-if="reply.subReplies" v-for="sub in reply.subReplies" :key="sub.id" class="d-flex mt-4">
        <div class="flex-shrink-0">
          <img :src="sub.avatar" :alt="sub.author" class="avatar-sm rounded-circle shadow-sm" />
        </div>
        <div class="flex-grow-1 ms-2">
          <h5 class="mb-1">
            {{ sub.author }}
            <small class="text-muted">{{ sub.date }} · {{ sub.time }}</small>
          </h5>
          <p class="mb-2">{{ sub.message }}</p>
          <Link href="#" class="badge bg-light text-muted d-inline-flex align-items-center gap-1">
            <Icon icon="corner-up-left" class="fs-lg" />
            Reply
          </Link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { ref } from 'vue'
import Icon from '@/components/wrappers/Icon.vue'
import user10 from '/images/users/user-10.jpg'
import user3 from '/images/users/user-3.jpg'
import user5 from '/images/users/user-5.jpg'
import user6 from '/images/users/user-6.jpg'
import user8 from '/images/users/user-8.jpg'

type Reply = {
  id: number
  author: string
  avatar: string
  date: string
  time: string
  message: string
  subReplies?: Reply[]
}

const forumRepliesData: Reply[] = [
  {
    id: 1,
    author: 'Liam Carter',
    avatar: user8,
    date: '15 Apr 2025',
    time: '09:20AM',
    message: 'Customers are reporting that the checkout page freezes after submitting their payment information.',
    subReplies: [
      {
        id: 11,
        author: 'Nina Bryant',
        avatar: user10,
        date: '15 Apr 2025',
        time: '11:47AM',
        message: 'That might be caused by the third-party payment gateway. I recommend testing in incognito mode and checking for any JS errors in the console.',
      },
      {
        id: 12,
        author: 'Sophie Allen',
        avatar: user3,
        date: '16 Apr 2025',
        time: '10:15AM',
        message: "We’ve noticed this issue before when the CDN cache hasn't been cleared properly. Try purging the cache and reloading the page.",
      },
    ],
  },
  {
    id: 2,
    author: 'Daniel West',
    avatar: user6,
    date: '14 Apr 2025',
    time: '04:15PM',
    message: 'You can also clear the browser cache or try a different browser. We had a similar issue with Chrome extensions interfering before.',
  },
  {
    id: 3,
    author: 'Nina Bryant',
    avatar: user10,
    date: '16 Apr 2025',
    time: '08:04AM',
    message: 'The System Status Page has been updated. We are actively monitoring and will release a patch within 24 hours.',
    subReplies: [
      {
        id: 31,
        author: 'Daniel West',
        avatar: user6,
        date: '16 Apr 2025',
        time: '08:30AM',
        message: "Thanks for the update! We'll notify the customers and let them know the issue is being resolved.",
      },
    ],
  },
]

const message = ref('')

const submitReply = () => {
  if (!message.value.trim()) return alert('Please enter a message.')
  alert(`Reply submitted: ${message.value}`)
  message.value = ''
}
</script>
