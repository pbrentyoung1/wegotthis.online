<template>
  <BCol lg="8">
    <h1 class="h3 mb-0">Mastering the Art of Focus: Tools & Strategies for Deep Work</h1>

    <p class="d-flex flex-wrap gap-3 text-muted mb-0 mt-3 align-items-center fs-base">
      <span class="badge text-bg-dark badge-label">Productivity</span>

      <span class="d-flex align-items-center gap-1"> <Icon icon="calendar" class="fs-md" /> Mar 18, 2025 </span>
      <span class="d-flex align-items-center gap-1">
        <Icon icon="message-circle" class="fs-md" />
        <Link href="" class="link-reset">42</Link>
      </span>

      <span class="d-flex align-items-center gap-1"> <Icon icon="eye" class="fs-md" /> 982 </span>
    </p>

    <img src="/images/blog/blog-post.jpg" class="img-fluid rounded mt-4 w-100" alt="blog-img" />

    <div class="fs-md">
      <p class="mt-4">In a world full of constant notifications and distractions, developing the ability to focus has become a superpower. This article dives into proven methods for cultivating deep work and staying productive in a digital age.</p>

      <p>Eliminating distractions and building a workflow that encourages uninterrupted focus can drastically improve your efficiency. Whether you're coding, writing, or designing — deep work leads to higher quality output and greater satisfaction.</p>

      <p>Some effective strategies include time-blocking your calendar, using tools like Pomodoro timers, and creating a distraction-free workspace. Even just 90 minutes of intentional, focused work per day can compound into massive progress over time.</p>

      <p class="mb-0">
        By embracing stillness and training your attention,
        <mark>you'll uncover a new level of clarity and creativity</mark>
        that transforms how you work and what you're capable of achieving.
      </p>
    </div>

    <div class="bg-light-subtle border border-light rounded d-md-flex justify-content-between align-items-center text-center p-3 mt-5">
      <h5 class="mb-0">Was this article helpful?</h5>

      <p class="py-3 p-md-0 mb-0"><b>41</b> out of <b>72</b> found this helpful</p>

      <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" />
        <label class="btn btn-soft-success btn-sm mb-0" for="btnradio1"> <Icon icon="thumb-up" class="me-1" /> Yes </label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" />
        <label class="btn btn-soft-danger btn-sm mb-0" for="btnradio2">
          No
          <Icon icon="thumb-down" class="ms-1" />
        </label>
      </div>
    </div>

    <div class="d-flex align-items-center gap-4 border mt-4 border-dashed p-4 rounded mb-14">
      <div class="text-center flex-shrink-0 me-7 me-lg-13">
        <div class="mb-2">
          <img src="/images/users/user-1.jpg" class="avatar-xl rounded-circle" alt="" />
        </div>
        <div class="mb-0">
          <Link href="#" class="fw-bold fs-sm">Nathan Brooks</Link>
          <span class="text-muted fs-6 fw-semibold d-block mt-1">Productivity Coach</span>
        </div>
      </div>

      <div class="mb-0">
        <div class="text-muted fw-medium lh-base mb-2">Nathan is passionate about helping creators, developers, and entrepreneurs reclaim their time and do meaningful work. He writes regularly about mindful productivity and digital wellness.</div>
        <Link href="#" class="fw-semibold link-primary">Author's Profile</Link>
      </div>
    </div>

    <div class="my-4 text-center">
      <h5 class="mb-3 text-uppercase fw-bold">Share This:</h5>

      <div class="d-flex justify-content-center gap-2 mt-4 mb-2">
        <Link v-for="(item, index) in socialLinks" :key="index" href="#!" :class="['btn', 'btn-icon', 'rounded-circle', item.colorClass]" :title="item.title">
          <span v-html="item.svg"></span>
        </Link>
      </div>
    </div>
  </BCol>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import Icon from '@/components/wrappers/Icon.vue'
import { socialLinks } from './data'
</script>
