<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Customer Details</h4>
      <RouterLink to="" class="btn btn-icon border-default-300 size-8! rounded-full border">
        <Icon icon="pencil" class="text-lg" />
      </RouterLink>
    </div>

    <div class="card-body">
      <div class="mb-7.5 flex items-center">
        <div class="relative me-2.5">
          <img :src="user5" alt="avatar-5" class="size-11 rounded-full object-cover" />
        </div>

        <div>
          <h5 class="flex items-center mb-1.25">
            <a href="#" class="text-default-800 hover:text-primary text-sm font-medium transition">Sophia Carter</a>
            <img :src="gbFlag" alt="UK" class="ms-2.5 size-4 rounded-full" />
          </h5>
          <p class="text-default-400 text-sm">Since 2020</p>
        </div>

        <div class="relative ms-auto">
          <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
            <button type="button" class="hs-dropdown-toggle btn btn-icon size-9.5 text-default-400 hover:bg-default-100" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
              <Icon icon="dots-vertical" class="text-xl" />
            </button>

            <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
              <div class="space-y-0.5">
                <a class="dropdown-item" href="#">
                  <Icon icon="share" />
                  Share
                </a>

                <a class="dropdown-item" href="#">
                  <Icon icon="edit" />
                  Edit
                </a>

                <a class="dropdown-item" href="#">
                  <Icon icon="ban" />
                  Block
                </a>

                <a class="dropdown-item text-danger" href="#">
                  <Icon icon="trash" />
                  Delete
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <ul class="text-default-400 space-y-2.5">
        <li>
          <div class="flex items-center gap-2.5">
            <span class="btn btn-icon bg-light text-default-800 size-6! rounded-full">
              <Icon icon="mail" class="text-sm" />
            </span>
            <h5>
              <a href="#" class="text-default-400 hover:text-primary font-medium text-sm transition-all">sophia&#64;designhub.com</a>
            </h5>
          </div>
        </li>

        <li>
          <div class="flex items-center gap-2.5">
            <span class="btn btn-icon bg-light text-default-800 size-6! rounded-full">
              <Icon icon="phone" class="text-sm" />
            </span>
            <h5>
              <a href="#" class="text-default-400 hover:text-primary font-medium text-sm transition-all">+44 7911 123456</a>
            </h5>
          </div>
        </li>

        <li>
          <div class="flex items-center gap-2.5">
            <span class="btn btn-icon bg-light text-default-800 size-6! rounded-full">
              <Icon icon="map-pin" class="text-sm" />
            </span>
            <h5>
              <span class="text-default-400 font-medium">London, UK</span>
            </h5>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
const user5 = '/images/users/user-5.jpg'
const gbFlag = '/images/flags/gb.svg'
</script>
